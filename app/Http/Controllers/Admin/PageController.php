<?php

/**
 * 单页控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;

class PageController extends BaseController
{
	//单页列表
	public function index()
	{
		$list = Page::orderBy('id','desc')->paginate(10);
		return view('admin.page.index', ['list'=> $list]);
	}

	//新增单页界面
	public function create()
	{
		return view('admin.page.create');
	}

	//新增单页操作
	public function store(PageRequest $request)
	{
		Page::create([
			'title' => $request->title,
			'alias' => $request->alias,
			'content' => $request->content,
			'keyword' => $request->keyword,
			'description' => $request->description
		]);

		return redirect()->route('admin.page.index')->with('success', '创建成功');
	}
	
	//编辑单页界面
	public function edit(Page $page)
	{
		return view('admin.page.create', ['page'=> $page]);
	}
	
	//编辑单页操作
	public function update(PageRequest $request, Page $page)
	{
		$page->update($request->all());

		return redirect()->back()->with('success', '编辑成功');
	}
	
	//删除单页
	public function destroy(Page $page)
	{
		$page->delete();

		return redirect()->route('admin.page.index')->with('success', '删除成功');
	}
}
