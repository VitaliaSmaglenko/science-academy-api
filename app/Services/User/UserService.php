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
}
