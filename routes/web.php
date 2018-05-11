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

// 首页
Route::get('/', 'IndexController@index')->name('home');

// 注册
Route::get('signup', 'UsersController@create')->name('signup');
Route::post('signup', 'UsersController@store')->name('signup');

// 登录
Route::get('login', 'LoginController@create')->name('login');
Route::post('login', 'LoginController@store')->name('login');

Route::get('/home', function (){
	return view('layouts.main');
});

Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin'
], function (){
	Route::get('/', 'IndexController@index')->name('admin.home');

	// 分类
	Route::get('category/index', 'CategoryController@index')->name('admin.category.index');
	Route::get('category/create', 'CategoryController@create')->name('admin.category.create');
	Route::post('category/store', 'CategoryController@store')->name('admin.category.store');
	Route::get('category/edit/{category}', 'CategoryController@edit')->name('admin.category.edit');
	Route::patch('category/update/{category}', 'CategoryController@update')->name('admin.category.update');
	Route::get('category/destroy/{category}', 'CategoryController@destroy')->name('admin.category.destroy');

	// 文章
	Route::get('article/index', 'ArticleController@index')->name('admin.article.index');
	Route::get('article/create', 'ArticleController@create')->name('admin.article.create');

	// 标签
	Route::get('tag/index', 'TagController@index')->name('admin.tag.index');
	Route::get('tag/create', 'TagController@create')->name('admin.tag.create');

	// 页面
	Route::get('page/index', 'PageController@index')->name('admin.page.index');
	Route::get('page/create', 'PageController@create')->name('admin.page.create');

});
