<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'departments' => $this->departments->map(function ($department) {
                return [
                    'name' => $department->department,
                    'position' => $department->pivot->position,
                ];
            }),
            'roles' => $this->roles->map(function ($role) {
                return [
                    'name' => $role->name,
                ];
            }),
        ];
    }
}
