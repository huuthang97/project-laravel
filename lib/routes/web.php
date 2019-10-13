<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Admin'], function () {
    // Login
    Route::group(['prefix' => 'login', 'middleware' => 'CheckedLogIn'], function () {
        Route::get('/', 'LoginController@getLogin');
        Route::post('/', 'LoginController@postLogin');
    });

    // Logout
    Route::get('logout', 'HomeController@getLogout');

    // Home
    Route::group(['prefix' => 'admin', 'middleware' => 'CheckedLogOut'], function () {
        Route::get('home', 'HomeController@getHome');
    });
});