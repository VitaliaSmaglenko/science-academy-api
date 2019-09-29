<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string'],
            'patronymic' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'academic_rank' => ['required', 'string'],
            'science_degree' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Field name is empty',
            'email.required' => 'Field email is empty',
            'password.required' => 'Field password is empty',
            'patronymic.required' => 'Field patronymic is empty',
            'surname.required' => 'Field surname is empty',
            'academic_rank.required' => 'Field academic rank is empty',
            'science_degree.required' => 'Field science degree is empty',
            'string' => 'Invalid string',
            'email' => 'Invalid email',
            'unique:users' => 'This email already exist in system',
        ];
    }
}
