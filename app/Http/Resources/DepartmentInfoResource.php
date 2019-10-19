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
            'users' => UsersResource::collection($this->users)
        ];
    }
}
