<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    public function getByEmail(string $email): Collection
    {
        return User::where('email', $email)->where('is_delete', false)->get();
    }

    public function getUser(string $email): User
    {
        return User::where('email', $email)->where('is_delete', false)->first();
    }

    public function getAll(): Collection
    {
        return User::where('is_delete', false)->get();
    }

    public function getOne(int $id): ?User
    {
        return User::where('id', $id)->where('is_delete', false)->first();
    }

    public function getByDepartment(int $id, int $departmentId): ?User
    {
        return User::where('id', $id)
            ->where('is_delete', false)
            ->with(['departments' => function($query) use ($departmentId) {
                $query->where('department_id', $departmentId);
            }])
            ->first();
    }
}