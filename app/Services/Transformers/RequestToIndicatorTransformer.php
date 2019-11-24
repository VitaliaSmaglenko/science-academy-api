<?php declare(strict_types=1);

namespace App\Services\Transformers;

use App\Services\Dto\IndicatorDto;
use Illuminate\Http\Request;

class RequestToIndicatorTransformer
{
    public function transform(Request $request)
    {
        $indicatorDto = new IndicatorDto();

        return $indicatorDto
            ->setUserId((int)$request->user_id)
            ->setNumberOfHours((float)$request->number_of_hours)
            ->setSeason($request->season)
            ->setWorkId((int)$request->work_id)
            ->setQuantity((int)$request->quantity);
    }
}