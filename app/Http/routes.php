<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::pattern('id', '[0-9]+');

Route::get('/', 'Home\IndexController@index');

Route::get('/nodes', 'Home\NodeController@index');

Route::get('/node/{id}', 'Home\NodeController@show');

Route::get('/users', 'Home\UserController@index');

Route::get('/user/{id}', 'Home\UserController@show');

Route::get('/tags', 'Home\TagController@index');

Route::get('install', 'Home\InstallController@show');
