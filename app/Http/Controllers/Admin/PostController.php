<?php

/**
 * 文章控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Category;
use App\Handlers\Level;
use Auth;
use App\Models\Tag;

class PostController extends BaseController
{
	public function index()
	{
		$list = Post::orderBy('id', 'desc')->paginate(10);
		return view('admin.post.index', ['list'=> $list]);
	}
	
	public function create(Level $level)
	{
		$list = Category::orderBy('sort', 'desc')->get();
		$list = $level->formatOne($list);

		return view('admin.post.create', ['list'=> $list]);
	}

	public function store(ArticleRequest $request)
	{
		$data = [
			'title' => $request->title,
			'category_id' => $request->category_id,
			'content' => $request->content,
			'user_id' => Auth::id(),
			'keyword' => $request->keyword,
			'description' => $request->description,
			'status' => $request->status,
			'views' => $request->views,
			'comments' => 0
		];

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

	public function edit(Post $post, Level $level)
	{
		$list = Category::orderBy('sort', 'desc')->get();
		$list = $level->formatOne($list);

		return view('admin.post.create', ['list'=> $list, 'post'=> $post]);
	}

	public function update(ArticleRequest $request, Article $article)
	{
		$article->update($request->all());

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

	public function destroy(Article $article)
	{
		$article->delete();

		return redirect()->back()->with('success', '删除成功');
	}
}
