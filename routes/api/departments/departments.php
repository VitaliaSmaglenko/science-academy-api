<?php

Route::get('departments', [
    'as' => 'get.department.index',
    'uses' => 'Api\DepartmentController@index'
])->middleware("auth:api");