<?php

use Peres\Clientes\Models\Clientes;

Route::group(['prefix' => 'api/v1'], function () {
    Route::resource('register', 'Indikator\User\Http\Http');
    Route::post('login', 'Indikator\User\Http\Http@login');
    Route::get('logged', 'Indikator\User\Http\Http@logged');
    Route::options('login', function(){
        return 200;
    });
    Route::get('clients', function(){
        
        return json_encode(Clientes::select('id','nome','sobrenome','rua','numero','bairro','complemento','contato','cidade','cpf','cep')->get());
         
    });
});
