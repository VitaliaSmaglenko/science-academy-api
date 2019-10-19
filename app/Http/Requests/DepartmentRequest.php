<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'department' => ['required', 'string'],
            'city' => ['required', 'string'],

        ];
    }

    public function messages(): array
    {
        return [
            'department.required' => 'Поле імені порожнє',
            'city.required' => 'Поле міста порожнє',
            'string' => 'Невалідна строка',
        ];
    }
}
