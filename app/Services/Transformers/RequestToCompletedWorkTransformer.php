<?php declare(strict_types=1);

namespace App\Services\Transformers;

use App\Services\Dto\CompletedWorkDto;
use Illuminate\Http\Request;

class RequestToCompletedWorkTransformer
{
    public function transform(Request $request, int $userId): CompletedWorkDto
    {
        $completedWorkDto = new CompletedWorkDto();

        !$request->reference ?: $completedWorkDto->setReference($request->reference);
        !$request->co_author_id ?: $completedWorkDto->setCoAuthorId((int)$request->co_author_id);

        return $completedWorkDto
            ->setUserId($userId)
            ->setNumberOfHours((float)$request->number_of_hours)
            ->setSeason($request->season)
            ->setTitle($request->title)
            ->setWorkId((int)$request->work_id);
    }
}