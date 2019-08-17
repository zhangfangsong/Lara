<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\LoginRequest;
use Auth;

class LoginController extends BaseController
{
	public function store(LoginRequest $request)
	{
		$data['email'] = $request->email;
		$data['password'] = $request->password;

		if(!$token = Auth::guard('api')->attempt($data)){
			return $this->response->errorUnauthorized('用户名或密码错误');
		}

		return $this->response->array([
			'access_token' => $token,
			'token_type' => 'Bearer',
			'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
		])->setStatusCode(201);
	}

}
