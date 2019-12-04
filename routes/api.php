<?php

use Illuminate\Http\Request;




Route::get('tasks', 'TaskController@index');
Route::get('task/{id}', 'TaskController@show');
Route::post('task', 'TaskController@store');
Route::put('task/{id}', 'TaskController@update');
Route::delete('task/{id}', 'TaskController@delete');
