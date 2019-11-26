<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IndicatorResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'quantity' => $this->quantity,
            'season' => $this->season,
            'number_of_hours' => $this->number_of_hours,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'work' => WorkResource::make($this->works),
            'user' => UserResource::make($this->users),
        ];
    }
}
