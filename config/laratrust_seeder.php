<?php

return [
    'role_structure' => [
        'administrator' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
        ],
        'manager' => [
            'users' => 'c,r,u,d',
        ],
        'user' => [
            'users' => 'r,u',
        ],
    ],
    'permission_structure' => [
        'cru_user' => [

        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
