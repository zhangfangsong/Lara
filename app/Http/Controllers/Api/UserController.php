<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Api\UserRequest;

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
}
