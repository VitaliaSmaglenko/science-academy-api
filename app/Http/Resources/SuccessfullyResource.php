<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuccessfullyResource extends JsonResource
{
    public function toArray($request): array
    {
       return [
           'message' => $this['message'],
           'type' => "success",
       ];
    }
}
