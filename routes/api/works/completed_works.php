<?php

Route::post('completed-works', [
    'as' => 'post.completed-works.create',
    'uses' => 'Api\CompletedWorkController@create'
])->middleware("auth:api");

Route::get('completed-works', [
    'as' => 'get.completed-works.getForUser',
    'uses' => 'Api\CompletedWorkController@getForUser'
])->middleware("auth:api");

Route::get('completed-works/{id}', [
    'as' => 'get.completed-works.show',
    'uses' => 'Api\CompletedWorkController@show'
])->middleware("auth:api");

Route::get('completed-works/users/{id}', [
    'as' => 'get.completed-works.getForAdmin',
    'uses' => 'Api\CompletedWorkController@getForAdmin'
])->middleware("auth:api");

Route::delete('completed-works/{id}', [
    'as' => 'delete.completed-works.destroy',
    'uses' => 'Api\CompletedWorkController@destroy'
])->middleware("auth:api");

Route::put('completed-works/{id}', [
    'as' => 'put.completed-works.update',
    'uses' => 'Api\CompletedWorkController@update'
])->middleware("auth:api");