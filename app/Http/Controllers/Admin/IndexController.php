<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class IndexController extends Controller
{
	public function index()
	{
		return view('admin.index.index');
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route('login')->with('success', '您已成功退出登录');
	}
}
