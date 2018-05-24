<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\UserRequest;

class UserController extends BaseController
{
	public function index()
	{
		$list = User::where('status', '<>', 2)->paginate(20);
		return view('admin.user.index', ['list'=> $list]);
	}

	public function create()
	{
		return view('admin.user.create');
	}

	public function store(UserRequest $request)
	{
		$user = User::add($request->all());

		return redirect()->route('admin.user.index')->with('success', '创建成功');
	}

	public function edit(User $user)
	{
		return view('admin.user.create', ['user'=> $user]);
	}

	public function update(UserRequest $request, User $user)
	{
		$data = $request->all();

		if($request->password){
			$data['password'] = bcrypt($request->password);
		}else{
			unset($data['password']);
		}

		$user->update($data);

		return redirect()->back()->with('success', '编辑成功');
	}

	public function destroy(User $user)
	{
		$user->update(['status'=> 2]);

		return redirect()->route('admin.user.index')->with('success', '删除成功');
	}
}
