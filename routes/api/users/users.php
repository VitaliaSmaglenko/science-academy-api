<?php

Route::post('users', [
    'as' => 'post.create.user',
    'uses' => 'Api\UserManageController@create'
])->middleware("auth:api")->middleware("manage-user");