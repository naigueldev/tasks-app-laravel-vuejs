<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('tasks', 'TaskController@index');

Route::middleware(['auth:api'])->group(function () {

    Route::get('tasks', 'TaskController@index');
    Route::get('task/{id}', 'TaskController@show');
    Route::post('task', 'TaskController@store');
    Route::put('task/{id}', 'TaskController@update');
    Route::delete('task/{id}', 'TaskController@delete');

});

