<?php

Route::get('roles', [
    'as' => 'get.role.index',
    'uses' => 'Api\RoleController@index'
])->middleware("auth:api");