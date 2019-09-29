<?php declare(strict_types=1);

namespace App\Services\Transformers;

use Illuminate\Http\Request;
use App\Services\Dto\UserDto;

class RequestToUserTransformer
{
    public function transform(Request $request): UserDto
    {
        return new UserDto(
            $request->name,
            $request->surname,
            $request->patronymic,
            $request->email,
            $request->password,
            $request->science_degree,
            $request->academic_rank,
            $request->position,
            (int) $request->department_id,
            (int) $request->role_id
        );
    }
}
