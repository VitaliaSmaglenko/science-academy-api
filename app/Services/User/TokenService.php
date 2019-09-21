<?php declare(strict_types=1);

namespace App\Services\User;

use Carbon\Carbon;
use Laravel\Passport\PersonalAccessTokenResult;
use Illuminate\Contracts\Auth\Authenticatable;

class TokenService
{
    public function create(Authenticatable $user, bool $rememberMe): PersonalAccessTokenResult
    {
        $token = $user->createToken("Personal access token");

        $token->token->expires_at = $rememberMe ?
            Carbon::now()->addMonth() :
            Carbon::now()->addDay();

        $token->token->save();

        return $token;
    }
}