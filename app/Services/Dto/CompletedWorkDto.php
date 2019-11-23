<?php declare(strict_types=1);

namespace App\Services\Dto;

class CompletedWorkDto
{
    private $userId;
    private $workId;
    private $title;
    private $reference;
    private $coAuthorId;
    private $numberOfHours;
    private $season;

    public function setUserId(int $userId): CompletedWorkDto
    {
        $this->userId = $userId;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setWorkId(int $workId): CompletedWorkDto
    {
        $this->workId = $workId;

        return $this;
    }

    public function getWorkId(): int
    {
        return $this->workId;
    }

    public function setTitle(string $title): CompletedWorkDto
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setReference(string $reference): CompletedWorkDto
    {
        $this->reference = $reference;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setCoAuthorId(int $coAuthorId): CompletedWorkDto
    {
        $this->coAuthorId = $coAuthorId;

        return $this;
    }

    public function getCoAuthorId(): ?int
    {
        return $this->coAuthorId;
    }

    public function setNumberOfHours(float $numberOfHours): CompletedWorkDto
    {
        $this->numberOfHours = $numberOfHours;

        return $this;
    }

    public function getNumberOfHours(): float
    {
        return $this->numberOfHours;
    }

    public function setSeason(string $season): CompletedWorkDto
    {
        $this->season = $season;

        return $this;
    }

    public function getSeason(): string
    {
        return $this->season;
    }
}