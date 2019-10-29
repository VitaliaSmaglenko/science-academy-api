<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class TokenResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'user' => UserResource::make($this['user']),
            'token' => [
                'access_token' => $this['token']->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $this['token']->token->expires_at
                )->toDateTimeString(),
            ],
        ];
    }
}
