<?php declare(strict_types=1);

namespace App\Services\Dto;

class IndicatorDto
{
    private $userId;
    private $workId;
    private $quantity;
    private $numberOfHours;
    private $season;

    public function setUserId(int $userId): IndicatorDto
    {
        $this->userId = $userId;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setWorkId(int $workId): IndicatorDto
    {
        $this->workId = $workId;

        return $this;
    }

    public function getWorkId(): int
    {
        return $this->workId;
    }

    public function setQuantity(int $quantity): IndicatorDto
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setNumberOfHours(float $numberOfHours): IndicatorDto
    {
        $this->numberOfHours = $numberOfHours;

        return $this;
    }

    public function getNumberOfHours(): float
    {
        return $this->numberOfHours;
    }

    public function setSeason(string $season): IndicatorDto
    {
        $this->season = $season;

        return $this;
    }

    public function getSeason(): string
    {
        return $this->season;
    }
}
