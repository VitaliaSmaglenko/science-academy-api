<?php

Route::post('indicators', [
    'as' => 'post.indicators.create',
    'uses' => 'Api\IndicatorController@create'
])->middleware("auth:api");

Route::get('indicators', [
    'as' => 'get.indicators.getForUser',
    'uses' => 'Api\IndicatorController@getForUser'
])->middleware("auth:api");

Route::get('indicators/{id}', [
    'as' => 'get.indicators.show',
    'uses' => 'Api\IndicatorController@show'
])->middleware("auth:api");

Route::get('indicators/users/{id}', [
    'as' => 'get.indicators.getByUser',
    'uses' => 'Api\IndicatorController@getByUser'
])->middleware("auth:api");

Route::delete('indicators/{id}', [
    'as' => 'delete.indicators.destroy',
    'uses' => 'Api\IndicatorController@destroy'
])->middleware("auth:api");

Route::put('indicators/{id}', [
    'as' => 'put.indicators.update',
    'uses' => 'Api\IndicatorController@update'
])->middleware("auth:api");