<?php

Route::group(['prefix' => 'api/v1'], function () {
    Route::get('cotacoes', 'Peres\Cotacao\Http\Http@getAll');
});
