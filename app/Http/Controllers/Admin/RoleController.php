<?php

/**
 * 角色控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Role;
use App\Models\Node;
use App\Handlers\Level;

class RoleController extends BaseController
{
	//角色列表
	public function index()
	{
		$list = Role::paginate(20);
		return view('admin.role.index', ['list'=>$list]);
	}

	//新增角色界面
	public function create()
	{
		return view('admin.role.create');
	}

	//新增角色操作
	public function store(RoleRequest $request)
	{
		Role::create([
			'name' => $request->name,
			'description' => $request->description
		]);

		return redirect()->route('admin.role.index')->with('success', '创建成功');
	}

	//编辑角色界面
	public function edit(Role $role)
	{
		return view('admin.role.create', ['role'=> $role]);
	}

	//编辑角色操作
	public function update(RoleRequest $request, Role $role)
	{
		$role->update($request->all());
		return redirect()->back()->with('success', '编辑成功');
	}

	//分配权限界面
	public function nodes(Role $role, Level $level)
	{
		$list = Node::all();
		$list = $level->formatMulti($list);
		
		$nodes = $role->nodes;
		
		$data = [];
		foreach($nodes as $val){
			$data[] = $val->id;
		}
		
		return view('admin.role.nodes', ['role'=>$role, 'list'=>$list, 'data'=> $data]);
	}
	
	//分配权限操作
	public function assign(Request $request, Role $role)
	{
		$nodes = $request->nodes;

		if(empty($nodes)){
			return redirect()->back()->with('danger', '请选择相应的权限');
		}
		$role->nodes()->sync($nodes);

		return redirect()->back()->with('success', '更新成功');
	}
	
	//删除角色
	public function destroy(Role $role)
	{
		$role->delete();
		
		return redirect()->route('admin.role.index')->with('success', '删除成功');
	}
}
