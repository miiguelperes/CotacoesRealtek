<?php

Route::group(['prefix' => 'api/v1'], function () {
    Route::resource('register', 'Rainlab\User\Http\Http');
    Route::post('login', 'Rainlab\User\Http\Http@login');
    Route::get('logged', 'Rainlab\User\Http\Http@logged');
    Route::get('getall', 'Rainlab\User\Http\Http@getAll');
    
    Route::options('login', function(){
        return 200;
    });
});
