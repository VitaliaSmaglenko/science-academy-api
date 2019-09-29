<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UserExist;

class CreateUserRequest extends FormRequest
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
            'password' => ['required', 'string'],
            'patronymic' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'academic_rank' => ['required', 'string'],
            'science_degree' => ['required', 'string'],
            'department_id' => ['required'],
            'position' => ['required', 'string'],
            'role_id' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле імені порожнє',
            'email.required' => 'Поле email порожнє',
            'password.required' => 'Поле паролю порожнє',
            'patronymic.required' => 'Поле призвище по-батькові порожнє',
            'surname.required' => 'Поле прізвище порожнє',
            'academic_rank.required' => 'Поле вчене звання порожнє',
            'science_degree.required' => 'Поле накова степінь порожнє',
            'position.required' => 'Поле посада порожнє',
            'role_id.required' => 'Поле ролі корчистувача порожнє',
            'department_id.required' => 'Поле кафедри порожнє',
            'string' => 'Невалідна строка',
            'email' => 'Невалідний email',
        ];
    }
}
