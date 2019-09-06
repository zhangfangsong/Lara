<?php

/**
 * 友链控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\LinkRequest;
use App\Models\Link;

class LinkController extends BaseController
{
	//链接列表
	public function index()
	{
		$list = Link::paginate(20);
		return view('admin.link.index', ['list'=>$list]);
	}

	//新增链接界面
	public function create()
	{
		return view('admin.link.create');
	}

	//新增链接操作
	public function store(LinkRequest $request)
	{
		Link::create([
			'name' => $request->name,
			'url' => $request->url,
			'logo' => $request->logo,
			'sort' => $request->sort,
			'status' => $request->status,
			'target' => $request->target,
		]);
		
		return redirect()->route('admin.link.index')->with('success', '创建成功');
	}
	
	//编辑链接界面
	public function edit(Link $link)
	{
		return view('admin.link.create', ['link'=> $link]);
	}
	
	//编辑链接操作
	public function update(LinkRequest $request, Link $link)
	{
		$link->update($request->all());
		return redirect()->back()->with('success', '编辑成功');
	}
	
	//删除链接
	public function destroy(Link $link)
	{
		$link->delete();
		return redirect()->route('admin.link.index')->with('success', '删除成功');
	}
}
