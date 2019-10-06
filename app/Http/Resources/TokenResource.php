<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class TokenResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'access_token' => $this['token']->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $this['token']->token->expires_at
            )->toDateTimeString(),
            'user' => $this['user'],
            'role' => $this['user']->roles->map(function ($role){
                return [
                    'name' => $role->name,
                ];
            }),
        ];
    }
}
