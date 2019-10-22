<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class TokenResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'user' => [
                'id' => $this['user']->id,
                'email' => $this['user']->email,
                'surname' => $this['user']->surname,
                'name' => $this['user']->name,
                'patronymic' => $this['user']->patronymic,
                'science_degree' => $this['user']->science_degree,
                'academic_rank' => $this['user']->academic_rank,
                'created_at' => $this['user']->created_at,
                'departments' =>UserDepartmentResource::collection( $this['user']->departments),
                'roles' => RolesCollectionResource::collection($this['user']->roles),
                'access_token' => $this['token']->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $this['token']->token->expires_at
                )->toDateTimeString(),
            ],
        ];
    }
}
