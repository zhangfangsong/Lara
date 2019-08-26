<?php

/**
 * 用户控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Models\Role;

class UserController extends BaseController
{
	//用户列表
	public function index()
	{
		$list = User::orderBy('id', 'desc')->paginate(20);
		return view('admin.user.index', ['list'=> $list]);
	}
	
	//新增用户界面
	public function create()
	{
		$roles = Role::all();
		return view('admin.user.create', ['roles'=> $roles]);
	}
	
	//新增用户操作
	public function store(UserRequest $request)
	{
		User::add($request->all());
		return redirect()->route('admin.user.index')->with('success', '创建成功');
	}
	
	//编辑用户界面
	public function edit(User $user)
	{
		$roles = Role::all();
		return view('admin.user.create', ['user'=> $user, 'roles'=> $roles]);
	}

	//编辑用户操作
	public function update(UserRequest $request, User $user)
	{
		$data = $request->all();

		if($request->password){
			$data['password'] = bcrypt($request->password);
		}
		$user->update($data);

		return redirect()->back()->with('success', '编辑成功');
	}
	
	//删除用户
	public function destroy(User $user)
	{
		$user->update(['status'=> 0]);
		
		return redirect()->route('admin.user.index')->with('success', '删除成功');
	}
}
