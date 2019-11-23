<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Work;
use Illuminate\Database\Eloquent\Collection;

class WorkRepository
{
    public function get(): Collection
    {
        return Work::get();
    }

    public function getById(int $id): ?Work
    {
        return Work::where('id', $id)->first();
    }
}