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

	//用户详情
	Route::get('users/{user}', 'UsersController@show')->name('users.show');

	//需要认证
	Route::middleware('auth:api')->group(function() {

		//文章
		Route::post('posts', 'PostsController@store')->name('posts.store');
		Route::patch('posts/{post}', 'PostsController@update')->name('posts.update');
		Route::delete('posts/{post}', 'PostsController@destroy')->name('posts.destroy');

		//评论
		Route::post('posts/{post}/comments', 'CommentsController@store')->name('comments.store');
		
		//上传图片
		Route::post('images', 'ImagesController@store')->name('images.store');

		//个人信息
		Route::get('user', 'UsersController@me')->name('user.show');
		//编辑信息
		Route::patch('user', 'UsersController@update')->name('user.update');
	});
});
