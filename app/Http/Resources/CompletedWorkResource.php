<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompletedWorkResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'season' => $this->season,
            'reference' => $this->reference,
            'number_of_hours' => $this->number_of_hours,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'co_author' => UserResource::make($this->authors),
            'work' => WorkResource::make($this->works),
            'user' => UserResource::make($this->users),
        ];
    }
}
