<?php

$api = app('Dingo\Api\Routing\Router');

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
		$api->get('search', 'ArticleController@search')->name('api.articles.search');
		$api->get('tags', 'TagController@index')->name('api.tags.index');
		$api->get('pulldown', 'ArticleController@pulldown')->name('api.articles.pulldown');
		$api->get('article/{article}', 'ArticleController@show')->name('api.articles.show');
		$api->get('article/{article}/comments', 'CommentController@index')->name('api.comments.index');

		$api->group(['middleware'=>'api.auth'], function ($api){
			$api->put('refresh', 'UserController@refresh')->name('api.refresh');
			$api->delete('logout', 'UserController@destroy')->name('api.logout');

			$api->get('user', 'UserController@me')->name('api.user.show');
			$api->patch('user', 'UserController@update')->name('api.user.update');
			$api->get('collections', 'CollectionController@index')->name('api.collection.index');
			$api->get('articleIds', 'CollectionController@articleIds')->name('api.collection.articleIds');

			$api->get('articles/{user}', 'ArticleController@my')->name('api.articles.my');
			$api->post('article/{article}/comments', 'CommentController@store')->name('api.comments.store');
			$api->delete('article/{article}/comments/{comment}', 'CommentController@destroy')->name('api.comments.destroy');

			$api->get('article/{article}/collections', 'CollectionController@store')->name('api.collections.store');

			$api->post('images', 'ImageController@store')->name('api.images.store');
		});

	});
});

