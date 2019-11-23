<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateWorkRequest;
use App\Http\Requests\UpdateCompletedWorkRequest;
use App\Http\Resources\CompletedWorkResource;
use App\Repositories\CompletedWorkRepository;
use App\Repositories\UserRepository;
use App\Repositories\WorkRepository;
use App\Services\Transformers\RequestToCompletedWorkTransformer;
use App\Services\Work\CompletedWorkService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SuccessfullyResource;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CompletedWorkController extends Controller
{
    /**
     * @var CompletedWorkRepository
     */
    private $completedWorkRepository;

    /**
     * @var CompletedWorkService
     */
    private $completedWorkService;

    /**
     * @var RequestToCompletedWorkTransformer
     */
    private $requestToCompletedWorkTransformer;

    /**
     * @var WorkRepository
     */
    private $workRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(
        CompletedWorkRepository $completedWorkRepository,
        CompletedWorkService $completedWorkService,
        RequestToCompletedWorkTransformer $requestToCompletedWorkTransformer,
        WorkRepository $workRepository,
        UserRepository $userRepository
    )
    {
        $this->completedWorkRepository = $completedWorkRepository;
        $this->completedWorkService = $completedWorkService;
        $this->requestToCompletedWorkTransformer = $requestToCompletedWorkTransformer;
        $this->workRepository = $workRepository;
        $this->userRepository = $userRepository;
    }

    public function create(CreateWorkRequest $request)
    {
        $userId = $request->user()->id;
        $work = $this->workRepository->getById((int)$request->work_id);

        if (!$work) {
            return response()->json([
                'message' => Lang::get("message.work.notFound")
            ], 404);
        }

        if ($request->co_author_id) {
            $user = $this->userRepository->getOne((int)$request->co_author_id);
            if (!$user) {
                return response()->json([
                    'message' => Lang::get("message.completedWork.coAuthorNotFound")
                ], 404);
            }
        }

        $completedWorkDto = $this->requestToCompletedWorkTransformer->transform($request, (int)$userId);
        $this->completedWorkService->create($completedWorkDto);

        return SuccessfullyResource::make([
            'message' => Lang::get("message.completedWork.create")
        ]);
    }


    public function getForUser(Request $request): AnonymousResourceCollection
    {
        $completedWorks = $this->completedWorkRepository->getByUserId((int)$request->user()->id);

        return CompletedWorkResource::collection($completedWorks);
    }

    public function show(string $id)
    {
        $completedWork = $this->completedWorkRepository->getById((int)$id);

        if (!$completedWork) {
            return response()->json([
                'message' => Lang::get("message.completedWork.notFound")
            ], 404);
        }

        return CompletedWorkResource::make($completedWork);
    }

    public function getForAdmin(string $user_id)
    {
        $user = $this->userRepository->getOne((int)$user_id);
        if (!$user) {
            return response()->json([
                'message' => Lang::get("message.user.notFound")
            ], 404);
        }
        $completedWorks = $this->completedWorkRepository->getByUserId((int)$user_id);

        return CompletedWorkResource::collection($completedWorks);
    }

    public function destroy(string $id)
    {
        $completedWork = $this->completedWorkRepository->getById((int)$id);

        if (!$completedWork) {
            return response()->json([
                'message' => Lang::get("message.completedWork.notFound")
            ], 404);
        }

        $this->completedWorkService->delete($completedWork);

        return SuccessfullyResource::make([
            'message' => Lang::get("message.completedWork.delete")
        ]);
    }

    public function update(string $id, UpdateCompletedWorkRequest $request)
    {
        $completedWork = $this->completedWorkRepository->getById((int)$id);

        if (!$completedWork) {
            return response()->json([
                'message' => Lang::get("message.completedWork.notFound")
            ], 404);
        }
        $completedWorkDto = $this->requestToCompletedWorkTransformer->transform($request);
        $completedWork = $this->completedWorkService->update($completedWorkDto, $completedWork);

        return CompletedWorkResource::make($completedWork);
    }
}
