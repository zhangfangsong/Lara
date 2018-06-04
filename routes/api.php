<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

Route::get('install/{model}', 'Install\IndexController@index')->name('install');

$api->version('v1', [
	'namespace' => 'App\Http\Controllers\Api',
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

		// 刷新,删除
		$api->put('refresh', 'UserController@update')->name('api.refresh');
		$api->delete('logout', 'UserController@destroy')->name('api.logout');
	});
});

