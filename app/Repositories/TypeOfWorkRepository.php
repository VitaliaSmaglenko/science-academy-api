<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\TypeOfWork;
use Illuminate\Database\Eloquent\Collection;

class TypeOfWorkRepository
{
    public function get(): Collection
    {
        return TypeOfWork::get();
    }

    public function getById(int $id): ?TypeOfWork
    {
        return TypeOfWork::where('id', $id)->first();
    }
}