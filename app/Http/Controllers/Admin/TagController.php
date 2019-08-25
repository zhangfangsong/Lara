<?php

/**
 * 标签控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;

class TagController extends BaseController
{
	//标签列表
	public function index()
	{
		$list = Tag::orderBy('id', 'desc')->paginate(20);
		return view('admin.tag.index', ['list'=>$list]);
	}
	
	//新增标签界面
	public function create()
	{
		return view('admin.tag.create');
	}

	//新增标签操作
	public function store(TagRequest $request)
	{
		$tag = Tag::create([
			'name' => $request->name,
			'status' => $request->status
		]);

		return redirect()->route('admin.tag.index')->with('success', '创建成功');
	}

	//编辑标签界面
	public function edit(Tag $tag)
	{
		return view('admin.tag.create', ['tag'=> $tag]);
	}
	
	//编辑标签操作
	public function update(TagRequest $request, Tag $tag)
	{
		$tag->update($request->all());
		
		return redirect()->back()->with('success', '编辑成功');
	}
	
	//删除标签
	public function destroy(Tag $tag)
	{
		$tag->delete();

		return redirect()->route('admin.tag.index')->with('success', '删除成功');
	}
}
