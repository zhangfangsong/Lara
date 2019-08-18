<?php

/**
 * 首页控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Handlers\ImageUpload;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Page;

class IndexController extends BaseController
{
	public function index()
	{
		$data = [
			'articleCount' => Post::count(),
			'userCount' => User::count(),
			'commentCount' => Comment::count(),
			'pageCount' => Page::count(),
		];
		$data['load'] = system_load();
		
		$data['comments'] = Comment::where('is_new', 1)->orderBy('id', 'desc')->limit(6)->get();
		$data['articles'] = Post::where('status', 1)->orderBy('id', 'desc')->limit(6)->get();
		
		return view('admin.index.index', $data);
	}
	
	public function profile()
	{
		return view('admin.index.profile');
	}

	public function profileUpdate(ProfileRequest $request)
	{
		$data = $request->all();
		$user = Auth::user();

		$user->update($data);
		return redirect()->back()->with('success', '编辑成功');
	}

	public function repass()
	{
		return view('admin.index.repass');
	}

	public function repassUpdate(ProfileRequest $request)
	{
		$user = Auth::user();
		$user->password = bcrypt(trim($request->password));

		$user->save();
		return redirect()->back()->with('success', '密码修改成功');
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route('login')->with('success', '您已成功退出登录');
	}

	public function upload(Request $request, ImageUpload $upload)
	{
		if($request->file){
			$result = $upload->upload($request->file, 'link');
			return $result;
		}
	}
}
