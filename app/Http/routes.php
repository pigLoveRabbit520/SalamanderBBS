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
Route::get('/', 'Home\IndexController@index');

Route::get('/node', 'Home\NodeController@index');

Route::get('/user', 'Home\UserController@index');

Route::get('/tag', 'Home\TagController@index');

Route::get('install', 'Home\InstallController@show');
