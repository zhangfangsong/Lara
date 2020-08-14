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
use Gregwar\Captcha\PhraseBuilder;

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
			'password' => 'required',
			'captcha'  => 'required',
		], ['captcha.required' => '验证码 不能为空']);

		$username = $data['username'];
		$credients['password'] = $data['password'];
		
		$code = session('code');
		if(!$code || (!PhraseBuilder::comparePhrases($code, $data['captcha']))) {
			session()->flash('danger', '验证码不正确');
			return redirect()->back();
		}

		filter_var($username, FILTER_VALIDATE_EMAIL) ? $credients['email'] = $username : $credients['username'] = $username;

		if(Auth::attempt($credients, $request->has('remember'))){

			if(Auth::user()->activated) {
				session()->flash('success', Auth::user()->username.',欢迎回来');
				return redirect()->intended(route('admin.dashboard.index'));
			} else {
				Auth::logout();
				session()->flash('danger', '账号未激活，请检查邮箱中的注册邮件进行激活');
				return redirect()->back();
			}
		}else{
			session()->flash('danger', '用户名或密码错误');

			return redirect()->back();
		}
	}

}
