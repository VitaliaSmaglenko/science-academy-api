<?php

Route::get('departments', [
    'as' => 'get.department.index',
    'uses' => 'Api\DepartmentController@index'
])->middleware("auth:api");

Route::post('departments', [
    'as' => 'post.department.create',
    'uses' => 'Api\DepartmentController@create'
])->middleware("auth:api");

Route::delete('departments/{id}', [
    'as' => 'delete.department.delete',
    'uses' => 'Api\DepartmentController@delete'
])->middleware("auth:api");

Route::put('departments/{id}', [
    'as' => 'put.department.update',
    'uses' => 'Api\DepartmentController@update'
])->middleware("auth:api");

Route::get('departments/{id}', [
    'as' => 'get.department.getInfo',
    'uses' => 'Api\DepartmentController@getInfo'
])->middleware("auth:api");

Route::put('departments/{id}/users', [
    'as' => 'put.department.addUser',
    'uses' => 'Api\DepartmentController@addUser'
])->middleware("auth:api");

Route::delete('departments/{departmentId}/users/{userId}', [
    'as' => 'delete.department.deleteUser',
    'uses' => 'Api\DepartmentController@deleteUser'
])->middleware("auth:api");