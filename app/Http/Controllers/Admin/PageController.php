<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Requests\Admin\PageRequest;

class PageController extends BaseController
{
	public function index()
	{
		$list = Page::orderBy('id','desc')->paginate(10);

		return view('admin.page.index', ['list'=> $list]);
	}

	public function create()
	{
		return view('admin.page.create');
	}

	public function store(PageRequest $request)
	{
		$page = Page::create([
			'title' => $request->title,
			'alias' => $request->alias,
			'content' => $request->content,
			'keyword' => $request->keyword,
			'description' => $request->description
		]);

		return redirect()->route('admin.page.index')->with('success', '创建成功');
	}

	public function edit(Page $page)
	{
		return view('admin.page.create', ['page'=> $page]);
	}

	public function update(PageRequest $request, Page $page)
	{
		$page->update($request->all());

		return redirect()->back()->with('success', '编辑成功');
	}

	public function destroy(Page $page)
	{
		$page->delete();

		return redirect()->route('admin.page.index')->with('success', '删除成功');
	}
}
