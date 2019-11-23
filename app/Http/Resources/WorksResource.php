<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorksResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title_hint,
            'part' => $this->part,
            'reference' => $this->reference_hint,
            'type' => $this->type,
        ];
    }
}
