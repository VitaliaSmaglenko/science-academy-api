<?php declare(strict_types=1);

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Laravel\Passport\PersonalAccessTokenResult;

class TokenService
{
    public function create(bool $rememberMe): PersonalAccessTokenResult
    {
        $token = Auth::user()->createToken("Personal access token");

        $token->token->expires_at = $rememberMe ?
            Carbon::now()->addMonth() :
            Carbon::now()->addDay();

        $token->token->save();

        return $token;
    }
}