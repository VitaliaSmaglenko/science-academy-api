<?php declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class UserExist implements Rule
{
    public function passes($attribute, $value): bool
    {
        $users = User::where('email', '=', $value)->get();
        foreach ($users as $user) {
            if(!$user->is_delete){
                return false;
            }
        }
        return true;
    }

    public function message(): string
    {
        return 'Користувач з таким email вже існує';
    }
}
