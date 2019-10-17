<?php

Route::post('users', [
    'as' => 'post.user.create',
    'uses' => 'Api\UserManageController@create'
])->middleware("auth:api")->middleware("manage-user");

Route::delete('users/{id}', [
    'as' => 'delete.user.delete',
    'uses' => 'Api\UserManageController@delete'
])->middleware("auth:api")->middleware("manage-user");

Route::get('users', [
    'as' => 'get.user.get-all',
    'uses' => 'Api\UserManageController@getAll'
])->middleware("auth:api")->middleware("manage-user");

Route::get('users/{id}', [
    'as' => 'get.user.get',
    'uses' => 'Api\UserManageController@get'
])->middleware("auth:api")->middleware("manage-user");

Route::put('users/{id}', [
    'as' => 'put.user.update',
    'uses' => 'Api\UserManageController@update'
])->middleware("auth:api")->middleware("manage-user");

Route::put('users/{id}/password', [
    'as' => 'put.user.update-password',
    'uses' => 'Api\UserManageController@updatePassword'
])->middleware("auth:api")->middleware("manage-user");

Route::put('users/{id}/role', [
    'as' => 'put.user.update-role',
    'uses' => 'Api\UserManageController@updateRole'
])->middleware("auth:api")->middleware("manage-user");

Route::put('users/{id}/department', [
    'as' => 'put.user.add-department',
    'uses' => 'Api\UserManageController@addDepartment'
])->middleware("auth:api")->middleware("manage-user");