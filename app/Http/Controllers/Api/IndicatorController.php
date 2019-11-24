<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateIndicatorRequest;
use App\Repositories\IndicatorRepository;
use App\Repositories\UserRepository;
use App\Repositories\WorkRepository;
use App\Services\Indicator\IndicatorService;
use App\Services\Transformers\RequestToIndicatorTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SuccessfullyResource;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
