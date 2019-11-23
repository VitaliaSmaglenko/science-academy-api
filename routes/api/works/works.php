<?php

Route::get('type-of-works', [
    'as' => 'get.type-of-works.index',
    'uses' => 'Api\TypeOfWorkController@index'
])->middleware("auth:api");

Route::get('type-of-works/{id}', [
    'as' => 'get.type-of-works.show',
    'uses' => 'Api\TypeOfWorkController@show'
])->middleware("auth:api");