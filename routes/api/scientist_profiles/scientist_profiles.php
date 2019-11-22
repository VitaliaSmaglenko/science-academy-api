<?php

Route::get('scientist-profiles', [
    'as' => 'get.scientist-profiles.index',
    'uses' => 'Api\ScientistProfileController@index'
])->middleware("auth:api");

Route::post('scientist-profiles', [
    'as' => 'post.scientist-profiles.create',
    'uses' => 'Api\ScientistProfileController@create'
])->middleware("auth:api");

Route::get('scientist-profiles/user', [
    'as' => 'get.scientist-profiles.getForUser',
    'uses' => 'Api\ScientistProfileController@getForUser'
])->middleware("auth:api");

Route::put('scientist-profiles/{id}', [
    'as' => 'put.scientist-profiles.update',
    'uses' => 'Api\ScientistProfileController@update'
])->middleware("auth:api");

Route::get('scientist-profiles/{id}', [
    'as' => 'get.scientist-profiles.show',
    'uses' => 'Api\ScientistProfileController@show'
])->middleware("auth:api");

Route::delete('scientist-profiles/{id}', [
    'as' => 'delete.scientist-profiles.destroy',
    'uses' => 'Api\ScientistProfileController@destroy'
])->middleware("auth:api");