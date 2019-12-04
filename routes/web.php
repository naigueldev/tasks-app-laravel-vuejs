<?php

Route::get('/','HomeController@index', function () {
    return view('welcome');
});

Route::get('/tasks-app', 'TasksappController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
