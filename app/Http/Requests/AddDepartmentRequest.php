<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'department_id' => ['required'],
            'position' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'position.required' => 'Поле посада порожнє',
            'department_id.required' => 'Поле кафедри порожнє',
            'string' => 'Невалідна строка',
        ];
    }
}
