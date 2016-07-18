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

Route::pattern('page', '[0-9]+');
Route::get('/', 'Home\IndexController@index');

Route::get('/nodes', 'Home\NodeController@index');

Route::get('/users', 'Home\UserController@index');

Route::get('/tags/{page?}', 'Home\TagController@index');

Route::get('install', 'Home\InstallController@show');
