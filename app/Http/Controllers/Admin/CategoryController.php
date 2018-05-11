<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
	public function index()
	{
		$all = Category::all();

		return view('admin.category.index', ['list'=> $all]);
	}

	public function create()
	{
		return view('admin.category.create');
	}

	public function store(CategoryRequest $request)
	{
		$category = Category::create([
			'name' => $request->name,
			'pid' => $request->pid,
			'description' => $request->description,
			'status' => $request->status,
			'sort' => $request->sort
		]);

		session()->flash('success', '创建成功');

		return redirect()->route('admin.category.index');
	}

	public function edit(Category $category)
	{
		return view('admin.category.edit', ['category'=> $category]);
	}

	public function update(CategoryRequest $request, Category $category)
	{

	}
}
