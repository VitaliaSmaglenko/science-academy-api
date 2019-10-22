<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Resources\RoleResource;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index(): AnonymousResourceCollection
    {
        $roles = $this->roleRepository->get();

        return RoleResource::collection($roles);
    }
}
