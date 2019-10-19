<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddDepartmentRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use App\Repositories\UserRepository;
use App\Services\Transformers\RequestToUserTransformer;
use App\Services\User\UserService;
use App\Http\Resources\SuccessfullyResource;
use App\Http\Requests\CreateUserRequest;
use App\Services\Transformers\RequestUpdateToUserTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class UserManageController extends Controller
{
    /**
     * @var RequestToUserTransformer
     */
    private $requestToUserTransformer;

    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var RequestUpdateToUserTransformer
     */
    private $requestUpdateToUserTransformer;

    public function __construct(
        RequestToUserTransformer $requestToUserTransformer,
        UserService $userService,
        UserRepository $userRepository,
        RequestUpdateToUserTransformer $requestUpdateToUserTransformer
    )
    {
        $this->requestToUserTransformer = $requestToUserTransformer;
        $this->userService = $userService;
        $this->userRepository = $userRepository;
        $this->requestUpdateToUserTransformer = $requestUpdateToUserTransformer;
    }

    public function create(CreateUserRequest $request): SuccessfullyResource
    {
        $userDto = $this->requestToUserTransformer->transform($request);
        $user = $this->userService->create($userDto);

        return SuccessfullyResource::make([
            'message' => Lang::get("message.user.create")
        ]);
    }

    public function delete(string $id): SuccessfullyResource
    {
        $user = $this->userRepository->getOne((int) $id);
        if(!$user) {
            return response()->json([
                'message' => Lang::get("message.user.notFound")
            ], 404);
        }
        $this->userService->delete($user);

        return SuccessfullyResource::make([
            'message' => Lang::get("message.user.delete")
        ]);
    }

    public function getAll()
    {
        $users = $this->userRepository->getAll();

        return UsersResource::collection($users);
    }

    public function get(string $id)
    {
        $user = $this->userRepository->getOne((int) $id);
        if(!$user) {
            return response()->json([
                'message' => Lang::get("message.user.notFound")
            ], 404);
        }
        return UserResource::make($user);
    }

    public function update(string $id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->getOne((int) $id);
        if(!$user) {
            return response()->json([
                'message' => Lang::get("message.user.notFound")
            ], 404);
        }
        $userDto = $this->requestUpdateToUserTransformer->transform($request);
        $user = $this->userService->update($user, $userDto);

        return UserResource::make($user);
    }

    public function updatePassword(string $id, PasswordRequest $request): SuccessfullyResource
    {
        $user = $this->userRepository->getOne((int) $id);
        if(!$user) {
            return response()->json([
                'message' => Lang::get("message.user.notFound")
            ], 404);
        }
        $this->userService->updatePassword($user, $request->password);

        return SuccessfullyResource::make([
            'message' => 'Пароль змінено'
        ]);
    }

    public function updateRole(string $id, Request $request)
    {
        $user = $this->userRepository->getOne((int) $id);
        if(!$user) {
            return response()->json([
                'message' => Lang::get("message.user.notFound")
            ], 404);
        }

        $user = $this->userService->updateRole($user, $request->role_id);

        return UserResource::make($user);

    }

    public function addDepartment(string $id, AddDepartmentRequest $request)
    {
        $user = $this->userRepository->getOne((int) $id);
        if(!$user) {
            return response()->json([
                'message' => Lang::get("message.user.notFound")
            ], 404);
        }
        $hasDepartment = $this->userRepository->getByDepartment((int) $id, (int) $request->department_id);
        if(count($hasDepartment->departments) != 0) {
            return response()->json([
                'message' => Lang::get("message.user.alreadyExist")
            ], 401);
        }

        $user = $this->userService->addDepartment(
            $user,
            (int) $request->department_id,
            $request->position
        );

        return UserResource::make($user);
    }
}
