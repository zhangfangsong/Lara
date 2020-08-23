<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Auth\AuthenticationException;

class UsersController extends BaseController
{
	//注册
	public function store(UserRequest $request)
	{
		$data = Cache::get($request->captcha_key);

		if(!$data) {
			abort(403, '验证码已失效');
		}
		if(!hash_equals($data['code'], $request->captcha_code)) {
			Cache::forget($request->captcha_key);
			throw new AuthenticationException('验证码错误');
		}
		
		$user = User::add([
			'username' => $request->username,
			'email' => $request->email,
			'password' => $request->password,
			'activated' => 1
		]);

		return (new UserResource($user))->showSensitiveFields();
	}

	//用户详情
	public function show(User $user, Request $request)
	{
		$user->load('role');
		return new UserResource($user);
	}

	//我的信息
	public function me(Request $request)
	{
		$user = $request->user();
		$user->load('role');
		return (new UserResource($user))->showSensitiveFields();
	}

	//编辑信息
	public function update(UserRequest $request)
	{
		$user = $request->user();
		$data = $request->only(['username', 'email', 'description', 'avatar']);
		$user->update($data);

		return (new UserResource($user))->showSensitiveFields();
	}
}