<?php declare(strict_types=1);

namespace App\Services\Indicator;

use App\Models\Indicator;
use App\Services\Dto\IndicatorDto;

class IndicatorService
{
    public function create(IndicatorDto $indicatorDto): Indicator
    {
        $indicator = new Indicator([
            'user_id' => $indicatorDto->getUserId(),
            'work_id' => $indicatorDto->getWorkId(),
            'quantity' => $indicatorDto->getQuantity(),
            'number_of_hours' => $indicatorDto->getNumberOfHours(),
            'season' => $indicatorDto->getSeason(),
        ]);

        $indicator->save();

        return $indicator;
    }

    public function delete(Indicator $indicator): bool
    {
        return $indicator->delete();
    }

    public function update(IndicatorDto $indicatorDto, Indicator $indicator): Indicator
    {
        $indicator->user_id = $indicatorDto->getUserId();
        $indicator->work_id = $indicatorDto->getWorkId();
        $indicator->quantity = $indicatorDto->getQuantity();
        $indicator->number_of_hours = $indicatorDto->getNumberOfHours();
        $indicator->season = $indicatorDto->getSeason();

        $indicator->save();

        return $indicator;
    }
}