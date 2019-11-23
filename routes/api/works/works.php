<?php

Route::get('works', [
    'as' => 'get.works.index',
    'uses' => 'Api\WorkController@index'
])->middleware("auth:api");

Route::get('works/{id}', [
    'as' => 'get.works.show',
    'uses' => 'Api\WorkController@show'
])->middleware("auth:api");

Route::post('completed-works', [
    'as' => 'post.completed-works.create',
    'uses' => 'Api\CompletedWorkController@create'
])->middleware("auth:api");