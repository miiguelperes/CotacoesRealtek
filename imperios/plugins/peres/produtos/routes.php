<?php

Route::group(['prefix' => 'api/v1'], function () {
    Route::get('produtos', 'Peres\Produtos\Http\Http@listProdutos');
    Route::get('categorias', 'Peres\Produtos\Http\Http@listCategorias');
});
