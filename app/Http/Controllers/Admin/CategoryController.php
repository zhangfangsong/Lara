<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Handlers\Level;

class CategoryController extends BaseController
{
	public function index(Level $level)
	{
		$list = Category::orderBy('sort', 'desc')->get();
		$list = $level->formatOne($list);

		return view('admin.category.index', ['list'=> $list]);
	}

	public function create(Level $level)
	{
		$list = Category::orderBy('id', 'asc')->get();
		$list = $level->formatOne($list);

		return view('admin.category.create', ['list'=> $list]);
	}

	public function store(CategoryRequest $request)
	{
		$category = Category::create([
			'name' => $request->name,
			'url' => $request->url,
			'pid' => $request->pid,
			'description' => $request->description,
			'status' => $request->status,
			'sort' => $request->sort
		]);

		session()->flash('success', '创建成功');

		return redirect()->route('admin.category.index');
	}

	public function edit(Category $category, Level $level)
	{
		$list = Category::orderBy('id', 'asc')->get();
		$list = $level->formatOne($list);

		return view('admin.category.create', ['list'=> $list, 'category'=> $category]);
	}

	public function update(CategoryRequest $request, Category $category, Level $level)
	{
		$data = $request->all();

		$list = Category::all();
		$childs_id_arr = $level->formatChild($list, $category->id);

		if(in_array($data['pid'], $childs_id_arr)){
			return redirect()->back()->with('danger', '父级分类不能选取子级作为父级');
		}

		$category->update($data);
		return redirect()->back()->with('success', '编辑成功');
	}

	public function destroy(Category $category)
	{
		$category->delete();

		return redirect()->route('admin.category.index')->with('success', '删除成功');
	}
}
