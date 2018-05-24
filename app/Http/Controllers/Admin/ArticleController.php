<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Category;
use App\Handlers\Level;
use Auth;
use App\Models\Tag;

class ArticleController extends BaseController
{
	public function index()
	{
		$list = Article::paginate(20);

		return view('admin.article.index', ['list'=> $list]);
	}

	public function create(Level $level)
	{
		$list = Category::orderBy('sort', 'desc')->get();
		$list = $level->formatOne($list);

		return view('admin.article.create', ['list'=> $list]);
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

		$article = Article::create($data);

		if($request->keyword){
			$tags = explode(',', $request->keyword);
			foreach($tags as $val){
				$tag = Tag::getByName($val);

				if(empty($tag)){
					Tag::add(['name'=> $val]);
				}
			}
		}

		return redirect()->route('admin.article.index')->with('success', '创建成功');
	}

	public function edit(Article $article, Level $level)
	{
		$list = Category::orderBy('sort', 'desc')->get();
		$list = $level->formatOne($list);

		return view('admin.article.create', ['list'=> $list, 'article'=> $article]);
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

		return redirect()->route('admin.article.index')->with('success', '删除成功');
	}
}
