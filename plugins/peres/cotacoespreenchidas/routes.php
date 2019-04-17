<?php

Route::group(['prefix' => 'api/v1'], function () {
    Route::post('inserircotacao', 'Peres\Cotacoespreenchidas\Http\Http@inserir');
    Route::post('exist', 'Peres\Cotacoespreenchidas\Http\Http@exist');
    Route::post('preenchidas','Peres\Cotacoespreenchidas\Http\Http@preenchidas');
});
