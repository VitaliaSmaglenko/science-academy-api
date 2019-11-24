<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateIndicatorRequest;
use App\Http\Requests\UpdateIndicatorRequest;
use App\Http\Resources\IndicatorResource;
use App\Repositories\IndicatorRepository;
use App\Repositories\UserRepository;
use App\Repositories\WorkRepository;
use App\Services\Indicator\IndicatorService;
use App\Services\Transformers\RequestToIndicatorTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SuccessfullyResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Lang;

class IndicatorController extends Controller
{
    /**
     * @var IndicatorRepository
     */
    private $indicatorRepository;

    /**
     * @var IndicatorService
     */
    private $indicatorService;

    /**
     * @var RequestToIndicatorTransformer
     */
    private $requestToIndicatorTransformer;

    /**
     * @var WorkRepository
     */
    private $workRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(
        IndicatorRepository $indicatorRepository,
        IndicatorService $indicatorService,
        RequestToIndicatorTransformer $requestToIndicatorTransformer,
        WorkRepository $workRepository,
        UserRepository $userRepository
    )
    {
        $this->indicatorRepository = $indicatorRepository;
        $this->indicatorService = $indicatorService;
        $this->requestToIndicatorTransformer = $requestToIndicatorTransformer;
        $this->workRepository = $workRepository;
        $this->userRepository = $userRepository;
    }

    public function create(CreateIndicatorRequest $request)
    {
        $work = $this->workRepository->getById((int)$request->work_id);
        if (!$work) {
            return response()->json([
                'message' => Lang::get("message.work.notFound")
            ], 404);
        }
        $user = $this->userRepository->getOne((int)$request->user_id);
        if (!$user) {
            return response()->json([
                'message' => Lang::get("message.user.notFound")
            ], 404);
        }
        $indicatorDto = $this->requestToIndicatorTransformer->transform($request);
        $indicator = $this->indicatorService->create($indicatorDto);

        return SuccessfullyResource::make([
            'message' => Lang::get("message.indicator.create")
        ]);
    }

    public function getForUser(Request $request): AnonymousResourceCollection
    {
        $indicators = $this->indicatorRepository->getByUserId($request->user()->id);

        return IndicatorResource::collection($indicators);
    }

    public function getByUser(string $userId)
    {
        $user = $this->userRepository->getOne((int)$userId);
        if (!$user) {
            return response()->json([
                'message' => Lang::get("message.user.notFound")
            ], 404);
        }
        $indicators = $this->indicatorRepository->getByUserId((int) $userId);

        return IndicatorResource::collection($indicators);
    }

    public function getForDepartment(string $departmentId)
    {

    }

    public function show(string $id)
    {
        $indicator = $this->indicatorRepository->getById((int) $id);

        if (!$indicator) {
            return response()->json([
                'message' => Lang::get("message.indicator.notFound")
            ], 404);
        }

        return IndicatorResource::make($indicator);
    }

    public function update(UpdateIndicatorRequest $request, $id)
    {
        $indicator = $this->indicatorRepository->getById((int) $id);

        if (!$indicator) {
            return response()->json([
                'message' => Lang::get("message.indicator.notFound")
            ], 404);
        }

        $work = $this->workRepository->getById((int)$request->work_id);
        if (!$work) {
            return response()->json([
                'message' => Lang::get("message.work.notFound")
            ], 404);
        }

        $user = $this->userRepository->getOne((int)$request->user_id);
        if (!$user) {
            return response()->json([
                'message' => Lang::get("message.user.notFound")
            ], 404);
        }

        $indicatorDto = $this->requestToIndicatorTransformer->transform($request);
        $indicator = $this->indicatorService->update($indicatorDto, $indicator);

        return IndicatorResource::make($indicator);
    }

    public function destroy(string $id)
    {
        $indicator = $this->indicatorRepository->getById((int) $id);

        if (!$indicator) {
            return response()->json([
                'message' => Lang::get("message.indicator.notFound")
            ], 404);
        }
        $this->indicatorService->delete($indicator);

        return SuccessfullyResource::make([
            'message' => Lang::get("message.indicator.delete")
        ]);
    }
}
