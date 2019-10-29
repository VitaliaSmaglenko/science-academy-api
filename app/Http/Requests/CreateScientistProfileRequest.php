<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateScientistProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'profile_link' => ['required', 'string'],
            'number_of_publication' => ['required'],
            'index' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле заголовк порожнє',
            'profile_link.required' => 'Поле посилання на профайл порожнє',
            'number_of_publication.required' => 'Поле кількість публікацій порожнє',
            'index.required' => 'Поле індекс порожнє',
            'string' => 'Невалідна строка',
        ];
    }
}
