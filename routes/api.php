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
	
	//用户详情
	Route::get('users/{user}', 'UsersController@show')->name('users.show');

	//需要认证
	Route::middleware('auth:api')->group(function() {
		
		//上传图片
		Route::post('images', 'ImagesController@store')->name('images.store');

		//个人信息
		Route::get('user', 'UsersController@me')->name('user.show');
		//编辑信息
		Route::patch('user', 'UsersController@update')->name('user.update');
	});
});
