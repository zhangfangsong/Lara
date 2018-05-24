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


Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	'middleware' => 'auth',
], function (){
	Route::get('/', 'IndexController@index')->name('admin.home');
	Route::get('logout', 'IndexController@logout')->name('admin.logout');
	Route::post('upload', 'IndexController@upload')->name('admin.upload');

	Route::get('profile', 'IndexController@profile')->name('admin.profile');
	Route::post('profile', 'IndexController@profileUpdate')->name('admin.profile');
	Route::get('repass', 'IndexController@repass')->name('admin.repass');
	Route::post('repass', 'IndexController@repassUpdate')->name('admin.repass');

	Route::get('config/{tab}', 'ConfigController@index')->name('admin.config');
	Route::post('config/{tab}', 'ConfigController@store')->name('admin.config');

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
	Route::post('article/store', 'ArticleController@store')->name('admin.article.store');
	Route::get('article/edit/{article}', 'ArticleController@edit')->name('admin.article.edit');
	Route::patch('article/update/{article}', 'ArticleController@update')->name('admin.article.update');
	Route::get('article/destroy/{article}', 'ArticleController@destroy')->name('admin.article.destroy');

	// 标签
	Route::get('tag/index', 'TagController@index')->name('admin.tag.index');
	Route::get('tag/create', 'TagController@create')->name('admin.tag.create');
	Route::post('tag/store', 'TagController@store')->name('admin.tag.store');
	Route::get('tag/edit/{tag}', 'TagController@edit')->name('admin.tag.edit');
	Route::patch('tag/update/{tag}', 'TagController@update')->name('admin.tag.update');
	Route::get('tag/destroy/{tag}', 'TagController@destroy')->name('admin.tag.destroy');

	// 链接
	Route::get('link/index', 'LinkController@index')->name('admin.link.index');
	Route::get('link/create', 'LinkController@create')->name('admin.link.create');
	Route::post('link/store', 'LinkController@store')->name('admin.link.store');
	Route::get('link/edit/{link}', 'LinkController@edit')->name('admin.link.edit');
	Route::patch('link/update/{link}', 'LinkController@update')->name('admin.link.update');
	Route::get('link/destroy/{link}', 'LinkController@destroy')->name('admin.link.destroy');

	// 页面
	Route::get('page/index', 'PageController@index')->name('admin.page.index');
	Route::get('page/create', 'PageController@create')->name('admin.page.create');
	Route::post('page/store', 'PageController@store')->name('admin.page.store');
	Route::get('page/edit/{page}', 'PageController@edit')->name('admin.page.edit');
	Route::patch('page/update/{page}', 'PageController@update')->name('admin.page.update');
	Route::get('page/destroy/{page}', 'PageController@destroy')->name('admin.page.destroy');
});
