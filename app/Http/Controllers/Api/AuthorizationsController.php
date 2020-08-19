<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\AuthorizationRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class AuthorizationsController extends BaseController
{
	//登录
	public function store(AuthorizationRequest $request)
	{
		$username = $request->username;

		filter_var($username, FILTER_VALIDATE_EMAIL) ? $data['email'] = $username : $data['username'] = $username;
		$data['password'] = $request->password;
		
		if(!$token = Auth::guard('api')->attempt($data)) {
			throw new AuthenticationException('用户名或密码错误');
		}
		
		return $this->respondWithToken($token)->setStatusCode(201);
	}

	//刷新token
	public function update()
	{
		$token = auth('api')->refresh();
		return $this->respondWithToken($token);
	}

	//退出登录
	public function destroy()
	{
		auth('api')->logout();
		return response(null, 204);
	}
	
	protected function respondWithToken($token)
	{
		return response()->json([
			'access_token' => $token,
			'expires_in'   => Auth::guard('api')->factory()->getTTL() * 60
		]);
	}
}
