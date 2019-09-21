<?php declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Services\Transformers\RequestToUserTransformer;
use Illuminate\Support\Facades\Lang;
use App\Http\Requests\RegisterRequest;
use App\Services\User\UserService;
use App\Http\Resources\SuccessfullyResource;

class RegisterController extends Controller
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

    protected function signUp(RegisterRequest $request): SuccessfullyResource
    {
        $userDto = $this->requestToUserTransformer->transform($request);
        $user = $this->userService->create($userDto);

        return SuccessfullyResource::make([
            'type' => User::FLASH_MESSAGE_SUCCESS,
            'message' => Lang::get('user.register.success')
        ]);
    }
}
