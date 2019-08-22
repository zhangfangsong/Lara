<?php

/**
 * 分类控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Handlers\Level;

class CategoryController extends BaseController
{
	//分类列表
	public function index(Level $level)
	{
		$list = Category::orderBy('sort', 'desc')->get();
		$list = $level->formatOne($list);

		return view('admin.category.index', ['list'=> $list]);
	}

	//新增界面
	public function create(Level $level)
	{
		$list = Category::orderBy('id', 'asc')->get();
		$list = $level->formatOne($list);

		return view('admin.category.create', ['list'=> $list]);
	}

	//新增操作
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

		return redirect()->route('admin.category.index')->with('success', '创建成功');
	}

	//编辑界面
	public function edit(Category $category, Level $level)
	{
		$list = Category::orderBy('id', 'asc')->get();
		$list = $level->formatOne($list);

		return view('admin.category.create', ['list'=> $list, 'category'=> $category]);
	}

	//编辑操作
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

	//删除处理
	public function destroy(Category $category)
	{
		if($category->hasChild()){
			return redirect()->back()->with('danger', '请先删除子级分类');
		}
		if($category->posts->count()){
			return redirect()->back()->with('danger', '请先删除分类下的文章');
		}
		
		$category->delete();
		
		return redirect()->route('admin.category.index')->with('success', '删除成功');
	}
}
