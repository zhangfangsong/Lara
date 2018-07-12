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
Route::get('cate/{category}.html', 'IndexController@category')->name('category');
Route::get('{article}.html', 'IndexController@article')->name('article');
Route::get('tag/{tag}.html', 'IndexController@search')->name('tag');
Route::get('time/{time}.html', 'IndexController@search')->name('time');
Route::get('search/{keyword}.html', 'IndexController@search')->name('search');

Route::group([
	'middleware' => 'guest',
], function (){
	Route::get('signup', 'UserController@create')->name('signup');
	Route::post('signup', 'UserController@store')->name('signup');

	Route::get('login', 'LoginController@create')->name('login');
	Route::post('login', 'LoginController@store')->name('login');
});

Route::group([
	'middleware' => 'auth',
], function (){
	Route::post('{article}/comment', 'IndexController@comment')->name('comment');
});

Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	'middleware' => 'auth',
], function (){
	Route::get('logout', 'IndexController@logout')->name('admin.logout');
});

Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	'middleware' => ['auth', 'privilege'],
], function (){
	Route::get('/', 'IndexController@index')->name('admin.home');
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

	// 用户
	Route::get('user/index', 'UserController@index')->name('admin.user.index');
	Route::get('user/create', 'UserController@create')->name('admin.user.create');
	Route::post('user/store', 'UserController@store')->name('admin.user.store');
	Route::get('user/edit/{user}', 'UserController@edit')->name('admin.user.edit');
	Route::patch('user/update/{user}', 'UserController@update')->name('admin.user.update');
	Route::get('user/destroy/{user}', 'UserController@destroy')->name('admin.user.destroy');

	// 角色
	Route::get('role/index', 'RoleController@index')->name('admin.role.index');
	Route::get('role/create', 'RoleController@create')->name('admin.role.create');
	Route::post('role/store', 'RoleController@store')->name('admin.role.store');
	Route::get('role/edit/{role}', 'RoleController@edit')->name('admin.role.edit');
	Route::patch('role/update/{role}', 'RoleController@update')->name('admin.role.update');
	Route::get('role/destroy/{role}', 'RoleController@destroy')->name('admin.role.destroy');

	// 评论
	Route::get('comment/index', 'CommentController@index')->name('admin.comment.index');
	Route::get('comment/edit/{comment}', 'CommentController@edit')->name('admin.comment.edit');
	Route::get('comment/destroy/{comment}', 'CommentController@destroy')->name('admin.comment.destroy');
});
