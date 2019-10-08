<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use App\Repositories\UserRepository;
use App\Services\Transformers\RequestToUserTransformer;
use App\Services\User\UserService;
use App\Http\Resources\SuccessfullyResource;
use App\Http\Requests\CreateUserRequest;

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

    public function __construct(
        RequestToUserTransformer $requestToUserTransformer,
        UserService $userService,
        UserRepository $userRepository
    )
    {
        $this->requestToUserTransformer = $requestToUserTransformer;
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }

    public function create(CreateUserRequest $request): SuccessfullyResource
    {
        $userDto = $this->requestToUserTransformer->transform($request);
        $user = $this->userService->create($userDto);

        return SuccessfullyResource::make([
            'message' => "Користувач створений"
        ]);
    }

    public function delete(string $id): SuccessfullyResource
    {
        $this->userService->delete((int) $id);

        return SuccessfullyResource::make([
            'message' => "Користувача видалено"
        ]);
    }

    public function getAll(): UsersResource
    {
        $users = $this->userRepository->getAll();

        return UsersResource::make($users);
    }

    public function get(string $id)
    {
        $user = $this->userRepository->getOne((int) $id);
        if(!$user) {
            return response()->json([
                'message' => 'Коричстувача не знайдено'
            ], 401);
        }
        return UserResource::make($user);
    }

}
