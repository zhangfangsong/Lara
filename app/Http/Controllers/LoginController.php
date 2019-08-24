<?php

/**
 * 登录控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
	//登录页面
	public function create()
	{
		return view('login.create');
	}
	
	//登录操作
	public function store(Request $request)
	{
		$data = $this->validate($request, [
			'username' => 'required|max:255',
			'password' => 'required'
		]);

		$username = $data['username'];
		
		filter_var($username, FILTER_VALIDATE_EMAIL) ? $data['email'] = $username : $data['username'] = $username;
		
		if(Auth::attempt($data, $request->has('remember'))){
			session()->flash('success', Auth::user()->username.',欢迎回来');
			
			return redirect()->intended(route('admin.dashboard.index'));
		}else{
			session()->flash('danger', '用户名或密码错误');

			return redirect()->back();
		}
	}

}
