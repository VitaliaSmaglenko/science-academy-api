<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIndicatorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'work_id' => ['required', 'string',],
            'user_id' => ['required', 'string',],
            'quantity' => ['string', 'required',],
            'number_of_hours' => ['required', 'string'],
            'season' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'work_id.required' => 'Вид роботи не вибраний',
            'user_id.required' => 'Викладач не вибраний',
            'number_of_hours.required' => 'Кількість часів не обрано',
            'season.required' => 'Поле сезону порожнє',
            'quantity.required' => 'Кількість часу не встановлена',
            'string' => 'Невалідна строка',
        ];
    }
}
