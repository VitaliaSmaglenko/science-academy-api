<?php declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class UserExist implements Rule
{
    public function passes($attribute, $value): bool
    {
        $countOfUsers = User::where('email', '=', $value)->where('is_delete', false)->count();
        if($countOfUsers != 0) {
            return false;
        }
        return true;
    }

    public function message(): string
    {
        return 'Користувач з таким email вже існує';
    }
}
