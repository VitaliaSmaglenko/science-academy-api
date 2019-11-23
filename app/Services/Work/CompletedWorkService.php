<?php declare(strict_types=1);

namespace App\Services\Work;

use App\Models\CompletedWork;
use App\Services\Dto\CompletedWorkDto;

class CompletedWorkService
{
    public function create(CompletedWorkDto $completedWorkDto): CompletedWork
    {
        $completedWork = new CompletedWork([
            'user_id' => $completedWorkDto->getUserId(),
            'type_id' => $completedWorkDto->getTypeId(),
            'title' => $completedWorkDto->getTitle(),
            'reference' => $completedWorkDto->getReference(),
            'co_author_id' => $completedWorkDto->getCoAuthorId(),
            'number_of_hours' => $completedWorkDto->getNumberOfHours(),
            'season' => $completedWorkDto->getSeason(),
        ]);

        $completedWork->save();

        return $completedWork;
    }
}