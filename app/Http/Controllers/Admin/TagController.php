<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\Admin\TagRequest;

class TagController extends BaseController
{
	public function index()
	{
		$list = Tag::paginate(20);
		return view('admin.tag.index', ['list'=>$list]);
	}

	public function create()
	{
		return view('admin.tag.create');
	}

	public function store(TagRequest $request)
	{
		$tag = Tag::create([
			'name' => $request->name,
			'status' => $request->status
		]);

		return redirect()->route('admin.tag.index')->with('success', '创建成功');
	}

	public function edit(Tag $tag)
	{
		return view('admin.tag.create', ['tag'=> $tag]);
	}

	public function update(TagRequest $request, Tag $tag)
	{
		$tag->update($request->all());

		return redirect()->back()->with('success', '编辑成功');
	}

	public function destroy(Tag $tag)
	{
		$tag->delete();

		return redirect()->route('admin.tag.index')->with('success', '删除成功');
	}
}
