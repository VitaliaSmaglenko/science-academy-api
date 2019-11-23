<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Resources\TypeOfWorkResource;
use App\Repositories\TypeOfWorkRepository;
use App\Services\Work\TypeOfWorkService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Lang;

class TypeOfWorkController extends Controller
{
    /**
     * @var TypeOfWorkRepository
     */
    private $typeOfWorkRepository;

    /**
     * @var TypeOfWorkService
     */
    private $typeOfWorkService;

    public function __construct(TypeOfWorkRepository $typeOfWorkRepository, TypeOfWorkService $typeOfWorkService)
    {
        $this->typeOfWorkRepository = $typeOfWorkRepository;
        $this->typeOfWorkService = $typeOfWorkService;
    }

    public function index(): AnonymousResourceCollection
    {
        $typesOfWork = $this->typeOfWorkRepository->get();

        return TypeOfWorkResource::collection($typesOfWork);
    }

    public function show(string $id)
    {
        $typeOfWork = $this->typeOfWorkRepository->getById((int) $id);
        if(!$typeOfWork) {
            return response()->json([
                'message' => Lang::get("message.typeOfWork.notFound")
            ], 404);
        }

        return TypeOfWorkResource::make($typeOfWork);
    }
}
