<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Handlers\Level;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Auth;

class IndexController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$list = Article::getRecent();
		return view('index.index', ['list'=> $list]);
	}

	public function category(Category $category, Level $level)
	{
		$categorys = Category::all();
		$childs_id_arr = $level->formatChild($categorys, $category->id);
		$list = Article::where('status', 1)->whereIn('category_id', $childs_id_arr)->orderBy('id', 'desc')->paginate(10);

		return view('index.category', ['list'=>$list, 'category'=>$category]);
	}

	public function article(Article $article)
	{
		Article::where('id', $article->id)->increment('views');
		return view('index.article', ['article'=> $article]);
	}

	public function comment(Article $article, CommentRequest $request)
	{
		$comment = Comment::create([
			'user_id' => Auth::user()->id,
			'article_id' => $article->id,
			'content' => $request->content,
			'at_id' => 0,
			'ip' => $request->getClientIp(),
			'status' => 1,
			'is_new' => 1,
		]);

		return redirect()->back()->with('success', '评论成功');
	}

	public function search(Request $request)
	{
		$data = Article::getSearch($request);
		return view('index.search', $data);
	}
}
