<?php

//网站前台
Route::get('/', 'IndexController@index')->name('home');
Route::get('cate/{category}', 'IndexController@category')->name('category');
Route::get('post/{post}', 'IndexController@post')->name('post');

Route::get('tag/{tag}', 'IndexController@search')->name('tag');
Route::get('time/{time}', 'IndexController@search')->name('time');
Route::get('search/{keyword}', 'IndexController@search')->name('search');

//验证码
Route::get('captcha', 'CaptchaController@store')->name('captcha');
//激活账号
Route::get('signup/confirm/{token}', 'UserController@confirmEmail')->name('confirm_email');

//登录与注册
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
	Route::post('{post}/comment', 'IndexController@comment')->name('comment');
});

//网站后台
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
	'middleware' => ['auth', 'privilege', 'getnav'],
], function (){
	Route::get('/', 'IndexController@index')->name('admin.dashboard.index');
	Route::post('upload', 'IndexController@upload')->name('admin.upload');
	
	Route::get('profile', 'IndexController@profile')->name('admin.dashboard.profile');
	Route::post('profile', 'IndexController@profileUpdate')->name('admin.dashboard.profile');
	Route::get('repass', 'IndexController@repass')->name('admin.dashboard.repass');
	Route::post('repass', 'IndexController@repassUpdate')->name('admin.dashboard.repass');
	
	Route::get('setting/main', 'SettingController@index')->name('admin.setting.main');
	Route::post('setting/main', 'SettingController@store')->name('admin.setting.main');
	Route::get('setting/upload', 'SettingController@index')->name('admin.setting.upload');
	Route::post('setting/upload', 'SettingController@store')->name('admin.setting.upload');
	
	// 分类
	Route::get('category/index', 'CategoryController@index')->name('admin.category.index');
	Route::get('category/create', 'CategoryController@create')->name('admin.category.create');
	Route::post('category/store', 'CategoryController@store')->name('admin.category.store');
	Route::get('category/edit/{category}', 'CategoryController@edit')->name('admin.category.edit');
	Route::patch('category/update/{category}', 'CategoryController@update')->name('admin.category.update');
	Route::get('category/destroy/{category}', 'CategoryController@destroy')->name('admin.category.destroy');
	
	// 文章
	Route::get('post/index', 'PostController@index')->name('admin.post.index');
	Route::get('post/create', 'PostController@create')->name('admin.post.create');
	Route::post('post/store', 'PostController@store')->name('admin.post.store');
	Route::get('post/edit/{post}', 'PostController@edit')->name('admin.post.edit');
	Route::patch('post/update/{post}', 'PostController@update')->name('admin.post.update');
	Route::get('post/destroy/{post}', 'PostController@destroy')->name('admin.post.destroy');
	
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
	Route::get('role/nodes/{role}', 'RoleController@nodes')->name('admin.role.nodes');
	Route::patch('role/assign/{role}', 'RoleController@assign')->name('admin.role.assign');
	Route::get('role/destroy/{role}', 'RoleController@destroy')->name('admin.role.destroy');

	// 节点
	Route::get('node/index', 'NodeController@index')->name('admin.node.index');
	Route::get('node/create', 'NodeController@create')->name('admin.node.create');
	Route::post('node/store', 'NodeController@store')->name('admin.node.store');
	Route::get('node/edit/{node}', 'NodeController@edit')->name('admin.node.edit');
	Route::patch('node/update/{node}', 'NodeController@update')->name('admin.node.update');
	Route::get('node/destroy/{node}', 'NodeController@destroy')->name('admin.node.destroy');

	// 评论
	Route::get('comment/index', 'CommentController@index')->name('admin.comment.index');
	Route::get('comment/edit/{comment}', 'CommentController@edit')->name('admin.comment.edit');
	Route::patch('comment/reply/{comment}', 'CommentController@reply')->name('admin.comment.reply');
	Route::get('comment/destroy/{comment}', 'CommentController@destroy')->name('admin.comment.destroy');
});
