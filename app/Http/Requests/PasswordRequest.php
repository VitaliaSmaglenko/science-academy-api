<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'password' => ['required', 'string', 'confirmed'],
            'password_confirmation' => ['required', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'Поле паролю порожнє',
            'password.confirmed' => 'Паролі не співпадають',
            'password_confirmation.required' => 'Поле підтвердження паролю порожнє',
            'string' => 'Невалідна строка',
        ];
    }
}
