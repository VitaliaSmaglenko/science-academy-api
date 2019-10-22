<?php declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Http\Resources\TokenResource;
use App\Http\Resources\UsersResource;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use App\Services\User\TokenService;
use App\Http\Resources\SuccessfullyResource;

class AuthController extends Controller
{
    /**
     * @var TokenService
     */
    private $tokenService;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(TokenService $tokenService, UserRepository $userRepository)
    {
        $this->tokenService = $tokenService;
        $this->userRepository = $userRepository;
    }

    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);
        if(!Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'is_delete' => false
        ]))
            return response()->json([
                'message' => 'Невірний email або пароль',
            ], 401);

        $token = $this->tokenService->create(Auth::user(), (bool) $request->remember_me);
        $user = $this->userRepository->getUser($credentials['email']);

        return TokenResource::make(['token' => $token, 'user' => $user]);
    }

    public function logout(Request $request): SuccessfullyResource
    {
        $request->user()->token()->revoke();

        return SuccessfullyResource::make([
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request): UsersResource
    {
        return UsersResource::make($request->user());
    }
}
