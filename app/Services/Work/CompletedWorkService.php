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
            'work_id' => $completedWorkDto->getWorkId(),
            'title' => $completedWorkDto->getTitle(),
            'reference' => $completedWorkDto->getReference(),
            'co_author_id' => $completedWorkDto->getCoAuthorId(),
            'number_of_hours' => $completedWorkDto->getNumberOfHours(),
            'season' => $completedWorkDto->getSeason(),
        ]);

        $completedWork->save();

        return $completedWork;
    }

    public function delete(CompletedWork $completedWork): bool
    {
        return $completedWork->delete();
    }

    public function update(CompletedWorkDto $completedWorkDto, CompletedWork $completedWork): CompletedWork
    {
        $completedWork->work_id = $completedWorkDto->getWorkId();
        $completedWork->title = $completedWorkDto->getTitle();
        $completedWork->reference = $completedWorkDto->getReference();
        $completedWork->co_author_id = $completedWorkDto->getCoAuthorId();
        $completedWork->number_of_hours = $completedWorkDto->getNumberOfHours();
        $completedWork->season = $completedWorkDto->getSeason();

        $completedWork->save();

        return $completedWork;
    }
}