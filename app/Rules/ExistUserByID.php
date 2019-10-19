<?php declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class ExistUserByID implements Rule
{
    public function passes($attribute, $value): bool
    {
        $user = User::where('id',  $value)->where('is_delete', false)->first();

        return ($user) ?  true :  false;
    }

    public function message(): string
    {
        return 'Користувач не існує';
    }
}
