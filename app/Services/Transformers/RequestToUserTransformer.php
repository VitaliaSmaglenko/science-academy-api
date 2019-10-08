<?php declare(strict_types=1);

namespace App\Services\Transformers;

use Illuminate\Http\Request;
use App\Services\Dto\UserDto;

class RequestToUserTransformer
{
    public function transform(Request $request): UserDto
    {
        $userDto = new UserDto();

        return $userDto
                ->setName($request->name)
                ->setPassword($request->password)
                ->setEmail($request->email)
                ->setAcademicRank($request->academic_rank)
                ->setDepartmentId((int) $request->department_id)
                ->setPatronymic($request->patronymic)
                ->setPosition( $request->position)
                ->setRoleId((int) $request->role_id)
                ->setScienceDegree($request->science_degree)
                ->setSurname($request->surname);
    }
}
