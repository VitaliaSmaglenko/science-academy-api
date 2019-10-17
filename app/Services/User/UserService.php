<?php declare(strict_types=1);

namespace App\Services\User;

use App\Models\User;
use App\Services\Dto\UserDto;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;

class UserService
{
    public function create(UserDto $userDto): User
    {
        $user = new User([
            'name' => $userDto->getName(),
            'surname' => $userDto->getSurname(),
            'patronymic' => $userDto->getPatronymic(),
            'email' => $userDto->getEmail(),
            'password' => Hash::make($userDto->getPassword()),
            'academicRank' => $userDto->getAcademicRank(),
            'scienceDegree' => $userDto->getScienceDegree(),
        ]);
        $user->save();

        $department = Department::find($userDto->getDepartmentId());
        $user->departments()->save($department, [
            'position' => $userDto->getPosition(),
        ]);
        $user->attachRole($userDto->getRoleId());

        return $user;
    }

    public function delete(int $id): int
    {
        return User::where('id', $id)
            ->where('is_delete', false)
            ->update(['is_delete' => true]);
    }

    public function update(User $user, UserDto $userDto): User
    {
        $user->name = $userDto->getName();
        $user->surname = $userDto->getSurname();
        $user->patronymic = $userDto->getPatronymic();
        $user->email = $userDto->getEmail();
        $user->academic_rank = $userDto->getAcademicRank();
        $user->science_degree = $userDto->getScienceDegree();

        $user->save();

        return $user;
    }

    public function updatePassword(User $user, string $password): User
    {
        $user->password = Hash::make($password);
        $user->save();

        return $user;
    }

    public function updateRole(User $user, string $roleId): User
    {
        $user->detachRoles();
        $user->attachRole($roleId);

        return $user;
    }

    public function addDepartment(User $user, int $departmentId, string $position): User
    {
        $department = Department::find($departmentId);
        $user->departments()->save($department, [
            'position' => $position,
        ]);

        return $user;
    }
}
