<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Resources\WorksResource;
use App\Repositories\WorkRepository;
use App\Services\Work\WorkService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Lang;

class WorkController extends Controller
{
    /**
     * @var WorkRepository
     */
    private $workRepository;

    /**
     * @var WorkService
     */
    private $workService;

    public function __construct(WorkRepository $workRepository, WorkService $workService)
    {
        $this->workRepository = $workRepository;
        $this->workService = $workService;
    }

    public function index(): AnonymousResourceCollection
    {
        $works = $this->workRepository->all();

        return WorksResource::collection($works);
    }

    public function show(string $id)
    {
        $work = $this->workRepository->getById((int) $id);
        if(!$work) {
            return response()->json([
                'message' => Lang::get("message.work.notFound")
            ], 404);
        }

        return WorksResource::make($work);
    }
}
