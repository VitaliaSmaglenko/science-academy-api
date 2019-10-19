<?php declare(strict_types=1);

namespace App\Services\Department;

use App\Models\Department;
use App\Models\User;

class DepartmentService
{
    public function create(array $params): Department
    {
        $department =  new Department([
            'department' => $params['department'],
            'city' => $params['city'],
        ]);

        $department->save();
        return $department;
    }

    public function update(Department $department, array $params): Department
    {
        $department->city = $params['city'];
        $department->department = $params['department'];
        $department->save();

        return $department;
    }

    public function delete(Department $department): bool
    {
        return $department->delete();
    }

    public function addUser(Department $department, int $userId, string $position): Department
    {
        $user = User::where(['id' => $userId, 'is_delete' => false])->first();
        $department->users()->save($user, [
            'position' => $position,
        ]);

        return $department;
    }
}