<?php

Route::group(['prefix' => 'api/v1'], function () {
    
    Route::post('venda', 'Peres\Vendas\Http\Http@cadastra');
    
});
