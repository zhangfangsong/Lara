<?php

/**
 * 文章控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Handlers\Level;
use Illuminate\Support\Facades\Auth;

class PostController extends BaseController
{
	//文章列表
	public function index()
	{
		$list = Post::orderBy('id', 'desc')->paginate(10);
		return view('admin.post.index', ['list'=> $list]);
	}
	
	//新增文章界面
	public function create(Level $level)
	{
		$list = Category::orderBy('sort', 'desc')->get();
		$list = $level->formatOne($list);

		return view('admin.post.create', ['list'=> $list]);
	}

	//新增文章操作
	public function store(PostRequest $request)
	{
		$data = [
			'title' => $request->title,
			'category_id' => $request->category_id,
			'content' => $request->content,
			'user_id' => Auth::id(),
			'keyword' => $request->keyword,
			'description' => $request->description,
			'status' => $request->status
		];
		$data['views'] = (int)$request->input('view', 0);

		if($request->thumb){
			$data['thumb'] = $request->thumb;
		}
		$article = Post::create($data);

		if($request->keyword){
			$tags = explode(',', $request->keyword);
			
			foreach($tags as $val){
				$tag = Tag::getByName($val);

				if(empty($tag)){
					Tag::add(['name'=> $val]);
				}
			}
		}

		return redirect()->route('admin.post.index')->with('success', '创建成功');
	}

	//编辑文章界面
	public function edit(Post $post, Level $level)
	{
		$list = Category::orderBy('sort', 'desc')->get();
		$list = $level->formatOne($list);

		return view('admin.post.create', ['list'=> $list, 'post'=> $post]);
	}

	//编辑文章操作
	public function update(PostRequest $request, Post $post)
	{
		$data = $request->all();
		$data['views'] = (int)$data['views'];

		$post->update($data);

		if($request->keyword){
			$tags = explode(',', $request->keyword);

			foreach($tags as $val){
				$tag = Tag::getByName($val);

				if(empty($tag)){
					Tag::add(['name'=> $val]);
				}
			}
		}
		
		return redirect()->back()->with('success', '编辑成功');
	}

	//删除文章
	public function destroy(Post $post)
	{
		$post->delete();

		return redirect()->back()->with('success', '删除成功');
	}
}
