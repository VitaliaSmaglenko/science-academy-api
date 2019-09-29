<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public const ROLE_ADMINISTRATOR = 'administrator';
    public const ROLE_USER = 'user';
    public const ROLE_MANAGER = 'manager';
}
