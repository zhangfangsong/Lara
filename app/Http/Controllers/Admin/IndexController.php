<?php

/**
 * 首页控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Handlers\ImageUpload;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Link;

class IndexController extends BaseController
{
	//仪表盘
	public function index()
	{
		$data = [
			'postCount' => Post::count(),
			'userCount' => User::count(),
			'commentCount' => Comment::count(),
			'linkCount' => Link::count(),
		];
		//仅限类Unix系统
		$data['load'] = system_load();
		
		$data['comments'] = Comment::where('read', 0)->orderBy('id', 'desc')->limit(6)->get();
		$data['posts'] = Post::where('status', 1)->orderBy('id', 'desc')->limit(6)->get();
		
		return view('admin.index.index', $data);
	}
	
	//我的资料
	public function profile()
	{
		return view('admin.index.profile');
	}

	//保存资料
	public function profileUpdate(ProfileRequest $request)
	{
		$data = $request->all();
		$data['avatar'] = $request->avatar ?: '';

		$user = Auth::user();
		
		$user->update($data);
		return redirect()->back()->with('success', '编辑成功');
	}

	//编辑密码界面
	public function repass()
	{
		return view('admin.index.repass');
	}
	
	//编辑密码操作
	public function repassUpdate(ProfileRequest $request)
	{
		$user = Auth::user();
		$user->password = bcrypt(trim($request->password));

		$user->save();
		return redirect()->back()->with('success', '密码修改成功');
	}
	
	//退出登录
	public function logout()
	{
		Auth::logout();
		return redirect()->route('login')->with('success', '您已成功退出登录');
	}
	
	//图片上传
	public function upload(Request $request, ImageUpload $upload)
	{
		if($request->file) {
			$file = $request->file;
			$fold = 'thumb';
		} else {
			$file = $request->file('editormd-image-file');
			$fold = 'editor';
		}
		
		$result = $upload->upload($file, $fold);
		return $result;
	}
}