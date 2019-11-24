<?php

Route::post('indicators', [
    'as' => 'post.indicators.create',
    'uses' => 'Api\IndicatorController@create'
])->middleware("auth:api");