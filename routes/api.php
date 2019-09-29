<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Api\Auth\AuthController@login');
    Route::get( 'login', [
        'as' => 'login',
    'uses' => 'Api\Auth\AuthController@login' ]
    );
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'Api\Auth\AuthController@logout');
    });
});