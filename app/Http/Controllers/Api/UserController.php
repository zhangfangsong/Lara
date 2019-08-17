<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Api\UserRequest;
use Auth;
use App\Transformers\UserTransformer;
use App\Transformers\ArticleTransformer;

class UserController extends BaseController
{
	public function store(UserRequest $request)
	{
		$user = User::add([
			'username' => $request->username,
			'email' => $request->email,
			'password' => $request->password
		]);

		return $this->response->item($user, new UserTransformer())
		->setMeta([
			'access_token' => Auth::guard('api')->fromUser($user),
			'token_type' => 'Bearer',
			'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
		])->setStatusCode(201);
	}

	public function refresh()
	{
		$token = Auth::guard('api')->refresh();
		return $this->responseWithToken($token);
	}

	public function destroy()
	{
		Auth::guard('api')->logout();
		return $this->response->noContent();
	}

	public function me()
	{
		return $this->response->item($this->user(), new UserTransformer());
	}

	public function update(UserRequest $request)
	{
		$user = $this->user();
		$data = $request->only(['username', 'email', 'description', 'avatar']);
		$user->update($data);

		return $this->response->item($user, new UserTransformer());
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
