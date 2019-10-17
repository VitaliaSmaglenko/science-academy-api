<?php declare(strict_types=1);

namespace App\Services\Transformers;

use Illuminate\Http\Request;
use App\Services\Dto\UserDto;

class RequestUpdateToUserTransformer
{
    public function transform(Request $request): UserDto
    {
        $userDto = new UserDto();

        return $userDto
            ->setName($request->name)
            ->setEmail($request->email)
            ->setAcademicRank($request->academic_rank)
            ->setPatronymic($request->patronymic)
            ->setScienceDegree($request->science_degree)
            ->setSurname($request->surname);
    }
}