<?php

Route::group(['prefix' => 'api/v1'], function () {
    Route::ressource('cores', 'Peres\API\Http\Core@test');
    Route::ressource('api/{id}', function($id){
    
        return "mozar é gay "+$id;
    });
    
});

