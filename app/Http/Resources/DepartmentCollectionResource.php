<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class DepartmentCollectionResource extends ResourceCollection
{
    public function toArray($request): Collection
    {
        return $this->collection->map(function ($department) {
            return [
                'id' => $department->id,
                'department' => $department->department,
                'city' => $department->city
            ];
        });
    }
}
