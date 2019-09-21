<?php declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Http\Resources\TokenResource;
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

    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }

    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Невірний email або пароль'
            ], 401);

        $token = $this->tokenService->create(Auth::user(), (bool) $request->remember_me);

        return TokenResource::make($token);
    }

    public function logout(Request $request): SuccessfullyResource
    {
        $request->user()->token()->revoke();

        return SuccessfullyResource::make([
            'message' => 'Successfully logged out'
        ]);
    }


    public function user(Request $request): JsonResponse
    {
        return response()->json($request->user());
    }
}
