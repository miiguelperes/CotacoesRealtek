<?php

Route::group(['prefix' => 'api/v1'], function () {
    Route::resource('https', 'Peres\Estoque\Http\Http');
});
