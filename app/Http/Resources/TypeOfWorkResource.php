<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TypeOfWorkResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'part' => $this->part,
            'reference' => $this->reference,
            'type' => $this->type,
        ];
    }
}
