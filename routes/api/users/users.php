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

Route::put('users/{id}', [
    'as' => 'put.update.user',
    'uses' => 'Api\UserManageController@update'
])->middleware("auth:api")->middleware("manage-user");

Route::put('users/{id}/password', [
    'as' => 'put.update-password.user',
    'uses' => 'Api\UserManageController@updatePassword'
])->middleware("auth:api")->middleware("manage-user");

Route::put('users/{id}/role', [
    'as' => 'put.update-role.user',
    'uses' => 'Api\UserManageController@updateRole'
])->middleware("auth:api")->middleware("manage-user");

Route::put('users/{id}/department', [
    'as' => 'put.add-department.user',
    'uses' => 'Api\UserManageController@addDepartment'
])->middleware("auth:api")->middleware("manage-user");