<?php

Route::post('users', [
    'as' => 'create.user',
    'uses' => 'Api\UserManageController@create'
])->middleware("auth:api")->middleware("manage-user");