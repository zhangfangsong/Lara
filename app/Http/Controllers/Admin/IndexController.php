<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Handlers\ImageUpload;

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

	public function upload(Request $request, ImageUpload $upload)
	{
		if($request->file){
			$result = $upload->upload($request->file, 'link', 'ln');
			return $result;
		}
	}
}
