<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\CompletedWork;
use Illuminate\Database\Eloquent\Collection;

class CompletedWorkRepository
{
    public function getByUserId(int $userId): Collection
    {
        return CompletedWork::where("user_id", $userId)->get();
    }

    public function getById(int $id): ?CompletedWork
    {
        return CompletedWork::where("id", $id)->first();
    }
}