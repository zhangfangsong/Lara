<?php

Route::prefix('v1')->namespace('Api')->name('api.')->middleware('throttle:10,1')->group(function() {
	
	//图片验证码
	Route::post('captchas', 'CaptchasController@store')->name('captchas.store');
	//注册
	Route::post('users', 'UsersController@store')->name('users.store');
	//登录
	Route::post('authorizations', 'AuthorizationsController@store')->name('authorizations.store');
});
