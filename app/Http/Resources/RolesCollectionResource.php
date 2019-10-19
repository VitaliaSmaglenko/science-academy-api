<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RolesCollectionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
        ];
    }
}
