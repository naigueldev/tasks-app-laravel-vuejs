<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('tasks', 'TaskController@index');
Route::get('task/{id}', 'TaskController@show');
Route::post('task', 'TaskController@store');
Route::put('task/{id}', 'TaskController@update');
Route::delete('task/{id}', 'TaskController@delete');
