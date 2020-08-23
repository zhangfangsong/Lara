<?php

Route::prefix('v1')->namespace('Api')->name('api.')->middleware('throttle:10,1')->group(function() {
	
	//图片验证码
	Route::post('captchas', 'CaptchasController@store')->name('captchas.store');
	//注册
	Route::post('users', 'UsersController@store')->name('users.store');
	//登录
	Route::post('authorizations', 'AuthorizationsController@store')->name('authorizations.store');

	//刷新
	Route::put('authorizations/current', 'AuthorizationsController@update')->name('authorizations.update');
	//退出
	Route::delete('authorizations/current', 'AuthorizationsController@destroy')->name('authorizations.destroy');
});

Route::prefix('v1')->namespace('Api')->name('api.')->middleware('throttle:100,1')->group(function() {

	//分类列表
	Route::get('categories', 'CategoriesController@index')->name('categories.index');

	//文章
	Route::get('posts', 'PostsController@index')->name('posts.index');
	Route::get('posts/{post}', 'PostsController@show')->name('posts.show');
	Route::get('users/{user}/posts', 'PostsController@userIndex')->name('users.posts');
	
	//评论
	Route::get('posts/{post}/comments', 'CommentsController@index')->name('comments.index');
	Route::get('users/{user}/comments', 'CommentsController@userIndex')->name('users.comments');

	//用户详情
	Route::get('users/{user}', 'UsersController@show')->name('users.show');

	//友链列表
	Route::get('links', 'LinksController@index')->name('links.index');
	
	//需要认证
	Route::middleware('auth:api')->group(function() {

		//文章
		Route::post('posts', 'PostsController@store')->name('posts.store');
		Route::patch('posts/{post}', 'PostsController@update')->name('posts.update');
		Route::delete('posts/{post}', 'PostsController@destroy')->name('posts.destroy');

		//评论
		Route::post('posts/{post}/comments', 'CommentsController@store')->name('comments.store');
		Route::delete('posts/{post}/comments/{comment}', 'CommentsController@destroy')->name('comments.destroy');

		//通知列表
		Route::get('notifications', 'NotificationsController@index')->name('notifications.index');
		//通知统计
		Route::get('notifications/stats', 'NotificationsController@stats')->name('notifications.stats');
		//标为已读
		Route::put('user/read/notifications', 'NotificationsController@read')->name('user.read.notifications');

		//上传图片
		Route::post('images', 'ImagesController@store')->name('images.store');

		//个人信息
		Route::get('user', 'UsersController@me')->name('user.show');
		//编辑信息
		Route::patch('user', 'UsersController@update')->name('user.update');

		//我的权限
		Route::get('user/permissions', 'PermissionsController@index')->name('user.permissions');
	});
});
