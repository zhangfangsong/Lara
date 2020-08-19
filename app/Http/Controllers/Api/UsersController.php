<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UsersController extends BaseController
{
	//注册
	public function store(UserRequest $request)
	{
		$user = User::add([
			'username' => $request->username,
			'email' => $request->email,
			'password' => $request->password,
			'activated' => 1
		]);

		return new UserResource($user);
	}
}