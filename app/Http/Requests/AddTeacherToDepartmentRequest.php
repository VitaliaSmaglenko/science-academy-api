<?php declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\ExistUserByID;
use Illuminate\Foundation\Http\FormRequest;

class AddTeacherToDepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', new ExistUserByID()],
            'position' => ['required', 'string'],

        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Вибіріть викладача',
            'position.required' => 'Поле позиція порожнє',
            'string' => 'Невалідна строка',
        ];
    }
}
