<?php

Route::get('departments', [
    'as' => 'get.departments.index',
    'uses' => 'Api\DepartmentController@index'
])->middleware("auth:api");