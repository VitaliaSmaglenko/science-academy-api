<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentInfoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'department' => $this->department,
            'city' => $this->city,
            'users' => $this->users->map(function ($user) {
                return [
                    'id' => $user->id,
                    'email' => $user->email,
                    'surname' => $user->surname,
                    'name' => $user->name,
                    'patronymic' => $user->patronymic,
                    'science_degree' => $user->science_degree,
                    'academic_rank' => $user->academic_rank,
                    'created_at' => $user->created_at,
                    'roles' => $user->roles->map(function ($role) {
                        return [
                            'name' => $role->name,
                        ];
                    }),
                ];
            }),
        ];
    }
}
