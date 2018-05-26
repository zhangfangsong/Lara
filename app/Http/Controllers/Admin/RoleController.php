<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\Admin\RoleRequest;

class RoleController extends BaseController
{
	public function index()
	{
		$list = Role::paginate(20);
		return view('admin.role.index', ['list'=>$list]);
	}

	public function create()
	{
		return view('admin.role.create');
	}

	public function store(RoleRequest $request)
	{
		$role = Role::create([
			'name' => $request->name,
			'nodes' => $request->nodes,
			'description' => $request->description
		]);

		return redirect()->route('admin.role.index')->with('success', '创建成功');
	}

	public function edit(Role $role)
	{
		return view('admin.role.create', ['role'=> $role]);
	}

	public function update(RoleRequest $request, Role $role)
	{
		$role->update($request->all());
		return redirect()->back()->with('success', '编辑成功');
	}

	public function destroy(Role $role)
	{
		$role->delete();
		return redirect()->route('admin.role.index')->with('success', '删除成功');
	}
}
