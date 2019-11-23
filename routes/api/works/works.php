<?php

Route::get('works', [
    'as' => 'get.works.index',
    'uses' => 'Api\WorkController@index'
])->middleware("auth:api");

Route::get('works/{id}', [
    'as' => 'get.works.show',
    'uses' => 'Api\WorkController@show'
])->middleware("auth:api");