<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'surname' => $this->surname,
            'name' => $this->name,
            'patronymic' => $this->patronymic,
            'science_degree' => $this->science_degree,
            'academic_rank' => $this->academic_rank,
            'created_at' => $this->created_at,
            'departments' => UserDepartmentResource::collection($this->departments),
            'roles' => RolesCollectionResource::collection($this->roles),
        ];
    }
}
