<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Indicator;
use Illuminate\Database\Eloquent\Collection;

class IndicatorRepository
{
    public function getByUserId(int $userId): Collection
    {
        return Indicator::where("user_id", $userId)->get();
    }

    public function getById(int $id): ?Indicator
    {
        return Indicator::where("id", $id)->first();
    }
}