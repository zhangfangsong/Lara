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

Route::get('/', 'IndexController@index')->name('home');

Route::get('signup', 'UsersController@create')->name('signup');
Route::post('signup', 'UsersController@store')->name('signup');

Route::get('login', 'LoginController@create')->name('login');
Route::post('login', 'LoginController@store')->name('login');
