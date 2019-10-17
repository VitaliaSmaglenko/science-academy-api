<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UserExist;

class UpdateUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', new UserExist()],
            'patronymic' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'academic_rank' => ['required', 'string'],
            'science_degree' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле імені порожнє',
            'email.required' => 'Поле email порожнє',
            'patronymic.required' => 'Поле по-батькові порожнє',
            'surname.required' => 'Поле прізвище порожнє',
            'academic_rank.required' => 'Поле вчене звання порожнє',
            'science_degree.required' => 'Поле наукова степінь порожнє',
            'string' => 'Невалідна строка',
            'email' => 'Невалідний email',
        ];
    }
}
