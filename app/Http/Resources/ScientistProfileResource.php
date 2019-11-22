<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScientistProfileResource extends JsonResource
{
    public function toArray($request)
    {
       return [
           'id' => $this->id,
           'title' => $this->title,
           'user_id' => $this->user_id,
           'profile_link' => $this->profile_link,
           'number_of_publication' => $this->number_of_publication,
           'index' => $this->index,
       ];
    }
}
