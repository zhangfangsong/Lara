<?php

/**
 * 节点控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\NodeRequest;
use App\Models\Node;
use App\Handlers\Level;

class NodeController extends BaseController
{
	//节点列表
	public function index(Level $level)
	{
		$list = Node::all();
		$list = $level->formatOne($list);

		return view('admin.node.index', ['list'=>$list]);
	}

	//新增节点界面
	public function create(Level $level)
	{
		$list = Node::all();
		$list = $level->formatOne($list);
		
		return view('admin.node.create', ['list'=> $list]);
	}
	
	//新增节点操作
	public function store(NodeRequest $request)
	{
		Node::create([
			'title'  => $request->title,
			'alias' => $request->alias,
			'name'  => $request->name,
			'pid' => $request->pid,
			'class_name' => $request->class_name,
			'sidebar' => $request->sidebar,
		]);
		
		return redirect()->route('admin.node.index')->with('success', '创建成功');
	}

	//编辑节点界面
	public function edit(Node $node, Level $level)
	{
		$list = Node::all();
		$list = $level->formatOne($list);

		return view('admin.node.create', ['list'=>$list, 'node'=>$node]);
	}

	//编辑节点操作
	public function update(NodeRequest $request, Node $node, Level $level)
	{
		$data = $request->all();

		$list = Node::all();
		$childs_id_arr = $level->formatChild($list, $node->id);

		if(in_array($data['pid'], $childs_id_arr)){
			return redirect()->back()->with('danger', '父级节点不能选取子级作为父级');
		}

		$node->update($data);
		return redirect()->back()->with('success', '编辑成功');
	}
	
	//删除节点
	public function destroy(Node $node)
	{
		if($node->hasChild()){
			return redirect()->back()->with('danger', '请先删除子级节点');
		}
		$node->delete();
		
		return redirect()->route('admin.node.index')->with('success', '删除成功');
	}
}
