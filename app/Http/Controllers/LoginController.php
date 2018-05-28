<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends BaseController
{
	public function create()
	{
		return view('login.create');
	}

	public function store(Request $request)
	{
		$data = $this->validate($request, [
			'email' => 'required|email|max:255',
			'password' => 'required'
		]);

		if(Auth::attempt($data, $request->has('remember'))){
			session()->flash('success', Auth::user()->username.',欢迎回来');

			return redirect()->route('admin.home');
		}else{
			session()->flash('danger', '用户名或密码错误');

			return redirect()->back();
		}
	}

}
