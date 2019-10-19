<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\AddTeacherToDepartmentRequest;
use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\DepartmentCollectionResource;
use App\Http\Resources\DepartmentInfoResource;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\SuccessfullyResource;
use App\Services\Department\DepartmentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\DepartmentRepository;
use Illuminate\Support\Facades\Lang;

class DepartmentController extends Controller
{
    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;

    /**
     * @var DepartmentService
     */
    private $departmentService;

    public function __construct(
        DepartmentRepository $departmentRepository,
        DepartmentService $departmentService
    )
    {
        $this->departmentRepository = $departmentRepository;
        $this->departmentService = $departmentService;
    }

    public function index(): DepartmentCollectionResource
    {
        $departments = $this->departmentRepository->getDepartments();

        return DepartmentCollectionResource::make($departments);
    }

    public function create(DepartmentRequest $departmentRequest): SuccessfullyResource
    {
        $this->departmentService->create([
            'department' => $departmentRequest->department,
            'city' => $departmentRequest->city,
        ]);

        return SuccessfullyResource::make([
            'message' => Lang::get('message.department.create'),
        ]);
    }

    public function update(string $id, DepartmentRequest $departmentRequest)
    {
        $department = $this->departmentRepository->getById((int)$id);
        if(!$department) {
            return response()->json([
                'message' => Lang::get("message.department.notFound")
            ], 404);
        }
        $department = $this->departmentService->update($department, [
            'department' => $departmentRequest->department,
            'city' => $departmentRequest->city,
        ]);

        return DepartmentResource::make($department);
    }

    public function delete(string $id)
    {
        $department = $this->departmentRepository->getById((int)$id);
        if(!$department) {
            return response()->json([
                'message' => Lang::get("message.department.notFound")
            ], 404);
        }

        $this->departmentService->delete($department);

        return SuccessfullyResource::make([
            'message' => Lang::get('message.department.delete'),
        ]);
    }

    public function getInfo(string $id)
    {
        $department = $this->departmentRepository->getInfo((int)$id);
        if(!$department) {
            return response()->json([
                'message' => Lang::get("message.department.notFound")
            ], 404);
        }

        return DepartmentInfoResource::make($department);
    }

    public function addUser(string $id, AddTeacherToDepartmentRequest $request )
    {
        $department = $this->departmentRepository->getById((int)$id);
        if(!$department) {
            return response()->json([
                'message' => Lang::get("message.department.notFound")
            ], 404);
        }

        $hasUser = $this->departmentRepository->getByUser((int) $id, (int) $request->user_id);
        if(count($hasUser->users) != 0) {
            return response()->json([
                'message' => Lang::get("message.department.alreadyExist")
            ], 401);
        }

        $department = $this->departmentService->addUser(
            $department,
            (int) $request->user_id,
            $request->position
        );

        return DepartmentInfoResource::make($department);
    }

    public function deleteUser(string $departmentId, string $userId)
    {
        $department = $this->departmentRepository->getByUser((int) $departmentId, (int) $userId);
        if(!$department) {
            return response()->json([
                'message' => Lang::get("message.department.notFound")
            ], 404);
        }
        if(count($department->users) == 0) {
            return response()->json([
                'message' => Lang::get("message.department.userNotFound")
            ], 401);
        }
        $department->users()->detach();

        return SuccessfullyResource::make([
            'message' => Lang::get('message.department.deleteUser'),
        ]);
    }
}
