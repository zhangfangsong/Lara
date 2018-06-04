<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Api\UserRequest;
use Auth;

class UserController extends BaseController
{
	public function store(UserRequest $request)
	{
		$user = User::add([
			'username' => $request->username,
			'email' => $request->email,
			'password' => $request->password
		]);

		return $this->response->created();
	}

	public function update()
	{
		$token = Auth::guard('api')->refresh();
		return $this->responseWithToken($token);
	}

	public function destroy()
	{
		Auth::guard('api')->logout();
		return $this->response->noContent();
	}

	protected function responseWithToken($token)
	{
		return $this->response->array([
			'access_token' => $token,
			'token_type' => 'Bearer',
			'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
		]);
	}
}
