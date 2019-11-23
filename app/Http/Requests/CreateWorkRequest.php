<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'work_id' => ['required', 'string',],
            'title' => ['required', 'string'],
            'reference' => ['string'],
            'co_author_id' => ['string'],
            'number_of_hours' => ['required', 'string'],
            'season' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'work_id.required' => 'Вид роботи не вибраний',
            'title.required' => 'Інформація о роботі порожня',
            'number_of_hours.required' => 'Кількість часів не обрано',
            'season.required' => 'Поле сезону порожнє',
            'string' => 'Невалідна строка',
        ];
    }
}
