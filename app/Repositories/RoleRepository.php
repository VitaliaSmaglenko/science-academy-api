<?php declare(strict_types=1);

namespace App\Repositories;

use App\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleRepository
{
    public static function get(): Collection
    {
        return Role::get();
    }
}