<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Resources\DepartmentCollectionResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\DepartmentRepository;

class DepartmentController extends Controller
{
    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function index(): DepartmentCollectionResource
    {
        $departments = $this->departmentRepository->getDepartments();

        return DepartmentCollectionResource::make($departments);
    }
}
