<?php

Route::post('users', [
    'as' => 'post.create.user',
    'uses' => 'Api\UserManageController@create'
])->middleware("auth:api")->middleware("manage-user");

Route::delete('users/{id}', [
    'as' => 'delete.delete.user',
    'uses' => 'Api\UserManageController@delete'
])->middleware("auth:api")->middleware("manage-user");

Route::get('users', [
    'as' => 'get.get-collection.user',
    'uses' => 'Api\UserManageController@getAll'
])->middleware("auth:api")->middleware("manage-user");

Route::get('users/{id}', [
    'as' => 'get.get.user',
    'uses' => 'Api\UserManageController@get'
])->middleware("auth:api")->middleware("manage-user");