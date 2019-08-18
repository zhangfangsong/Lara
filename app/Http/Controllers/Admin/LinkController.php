<?php

/**
 * 友链控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Http\Requests\Admin\LinkRequest;

class LinkController extends BaseController
{
	public function index()
	{
		$list = Link::paginate(20);
		return view('admin.link.index', ['list'=>$list]);
	}

	public function create()
	{
		return view('admin.link.create');
	}

	public function store(LinkRequest $request)
	{
		$link = Link::create([
			'name' => $request->name,
			'url' => $request->url,
			'logo' => $request->logo,
			'sort' => $request->sort,
			'target' => $request->target
		]);

		return redirect()->route('admin.link.index')->with('success', '创建成功');
	}

	public function edit(Link $link)
	{
		return view('admin.link.create', ['link'=> $link]);
	}

	public function update(LinkRequest $request, Link $link)
	{
		$link->update($request->all());
		return redirect()->back()->with('success', '编辑成功');
	}

	public function destroy(Link $link)
	{
		$link->delete();
		return redirect()->route('admin.link.index')->width('success', '删除成功');
	}
}
