<?php

/**
 * 注册控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends BaseController
{
	public function create()
	{
		return view('users.create');
	}

	public function store(UserRequest $request)
	{
		$user = User::add([
			'username' => $request->username,
			'email' => $request->email,
			'password' => $request->password
		]);

		session()->flash('success', '注册成功,您将在这里开启一段新的旅程');

		return redirect()->route('home');
	}
}
