<?php

use Illuminate\Http\Request;

$api = app('Dingo\Api\Routing\Router');

Route::get('install/{model}', 'Install\IndexController@index')->name('install');

$api->version('v1', [
	'namespace' => 'App\Http\Controllers\Api',
	'middleware' => ['serializer:array', 'bindings'],
], function ($api){
	$api->group([
		'middleware' => 'api.throttle',
		'limit' => config('api.rate_limits.sign.limit'),
		'expires' => config('api.rate_limits.sign.expires'),
	], function ($api){
		$api->get('index', 'IndexController@index')->name('api.home');
		// 注册
		$api->post('users', 'UserController@store')->name('api.signup');
		// 登录
		$api->post('login', 'LoginController@store')->name('api.login');

		$api->get('categories', 'CategoryController@index')->name('api.categories.index');
		$api->get('articles', 'ArticleController@index')->name('api.articles.index');
		$api->get('article/{article}', 'ArticleController@show')->name('api.articles.show');

		$api->group(['middleware'=>'api.auth'], function ($api){
			$api->put('refresh', 'UserController@refresh')->name('api.refresh');
			$api->delete('logout', 'UserController@destroy')->name('api.logout');

			$api->get('user', 'UserController@me')->name('api.user.show');
			$api->patch('user', 'UserController@update')->name('api.user.update');

			$api->get('articles/{user}', 'ArticleController@my')->name('api.articles.my');

			$api->post('images', 'ImageController@store')->name('api.images.store');
		});

	});
});

