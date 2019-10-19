<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;

class DepartmentRepository
{
    public function getDepartments(): Collection
    {
        return Department::get();
    }

    public function getById(int $id): ?Department
    {
        return Department::where('id', $id)->first();
    }

    public function getInfo(int $id): ?Department
    {
        return Department::where('id', $id)
            ->with(['users' => function($query) use ($id) {
                $query->where('department_id', $id);
            }])
            ->first();
    }

    public function getByUser(int $id, int $userId): ?Department
    {
        return Department::where('id', $id)
            ->with(['users' => function($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->first();
    }
}