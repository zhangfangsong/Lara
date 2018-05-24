<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
	public function create()
	{
		return view('users.create');
	}

	public function store(UserRequest $request)
	{
		$user = User::create([
			'username' => $request->username,
			'email' => $request->email,
			'password' => bcrypt($request->password)
		]);

		session()->flash('success', '注册成功,您将在这里开启一段新的旅程');

		return redirect()->route('home');
	}
}
