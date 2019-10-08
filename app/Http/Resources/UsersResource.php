<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UsersResource extends ResourceCollection
{

    public function toArray($request)
    {
        return $this->collection->map(function ($user) {
            return [
                'id' => $user->id,
                'email' => $user->email,
                'surname' => $user->surname,
                'name' => $user->name,
                'patronymic' => $user->patronymic,
                'science_degree' => $user->science_degree,
                'academic_rank' => $user->academic_rank,
                'created_at' => $user->created_at,
                'departments' => $user->departments->map(function ($department) {
                    return [
                        'name' => $department->department,
                        'position' => $department->pivot->position,
                    ];
                }),
                'roles' => $user->roles->map(function ($role) {
                    return [
                        'name' => $role->name,
                    ];
                }),
            ];
        });
    }
}
