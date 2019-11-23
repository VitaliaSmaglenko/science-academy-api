<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title_hint,
            'name' => $this->name,
            'reference' => $this->reference_hint,
            'type' => $this->type,
        ];
    }
}
