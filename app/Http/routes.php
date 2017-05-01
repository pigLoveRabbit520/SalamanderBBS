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
use Mews\Captcha\Facades\Captcha;

Route::pattern('id', '[0-9]+');
Route::pattern('uid', '[0-9]+');

Route::get('/', 'Home\IndexController@index');

Route::get('nodes', 'Home\NodeController@index');

Route::get('node/{id}', 'Home\NodeController@show');

Route::get('users', 'Home\UserController@index');

// 用户路由
Route::group(['prefix' => 'user'], function() {
    Route::get('register', 'Home\UserController@register');

    Route::get('login', 'Home\UserController@login');

    Route::get('/{uid}', 'Home\UserController@showUserPersonalPage');

    Route::post('checkReg', 'Home\UserController@checkRegInfo');

    Route::post('checkLogin', 'Home\UserController@checkLogin');

    Route::get('logout', 'Home\UserController@logout');

});

// 用户设置路由
Route::group(['prefix' => 'settings'], function() {
    Route::get('/', 'Home\UserController@showProfileSettings');

    Route::get('profile', 'Home\UserController@showProfileSettings');

    Route::get('avatar', 'Home\UserController@showAvatarSettings');

    Route::get('password', 'Home\UserController@showPassowrdSettings');
});

Route::get('/tags', 'Home\TagController@index');

Route::get('/topic/add', 'Home\TopicController@add');

Route::get('/getCaptcha', function() {
    return Captcha::create('default');
});

Route::get('install', 'Home\InstallController@show');
