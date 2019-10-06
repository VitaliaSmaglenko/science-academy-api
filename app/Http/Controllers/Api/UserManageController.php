<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function __construct(
        RequestToUserTransformer $requestToUserTransformer,
        UserService $userService
    )
    {
        $this->requestToUserTransformer = $requestToUserTransformer;
        $this->userService = $userService;
    }
    public function create(CreateUserRequest $request): SuccessfullyResource
    {
        $userDto = $this->requestToUserTransformer->transform($request);
        $user = $this->userService->create($userDto);

        return SuccessfullyResource::make([
            'message' => "Користувач створений"
        ]);
    }

}
