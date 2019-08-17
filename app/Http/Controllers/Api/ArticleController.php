<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Handlers\Level;
use App\Transformers\ArticleTransformer;
use App\Models\User;

class ArticleController extends BaseController
{
	public function index(Request $request, Level $level)
	{
		$map = [
			'status' => 1
		];

		$limit = $request->limit;
		$article_id = $request->aid;

		if(!$limit){
			$limit = 3;
		}
		if($article_id){
			$map[] = ['id', '<', $article_id];
		}

		if($category_id = $request->category_id){
			$categorys = Category::all();
			$childs_id_arr = $level->formatChild($categorys, $category_id);
			$articles = Article::where($map)->whereIn('category_id', $childs_id_arr)->orderBy('id', 'desc')->limit($limit)->get();
		}else{
			$articles = Article::where($map)->orderBy('id', 'desc')->limit($limit)->get();
		}

		return $this->response->collection($articles, new ArticleTransformer());
	}

	public function pulldown(Request $request)
	{
		$map = [
			'status' => 1
		];
		$article_id = $request->aid;

		if($article_id){
			$map[] = ['id', '>', $article_id];
		}

		$articles = Article::where($map)->orderBy('id', 'asc')->get();

		return $this->response->collection($articles, new ArticleTransformer());
	}

	public function search(Request $request, Level $level)
	{
		$map = [
			'status' => 1
		];

		$limit = $request->limit;
		$tag = $request->tag;
		$keyword = $request->keyword;

		if(!$limit){
			$limit = 3;
		}
		if($tag){
			$map[] = ['keyword', 'like', '%'.$tag.'%'];
		}
		if($keyword){
			$map[] = ['title', 'like', '%'.$keyword.'%'];
		}

		if($category_id = $request->catid){
			$categorys = Category::all();
			$childs_id_arr = $level->formatChild($categorys, $category_id);
			$articles = Article::where($map)->whereIn('category_id', $childs_id_arr)->orderBy('id', 'desc')->paginate($limit);
		}else{
			$articles = Article::where($map)->orderBy('id', 'desc')->paginate($limit);
		}

		return $this->response->paginator($articles, new ArticleTransformer());
	}

	public function my(User $user)
	{
		if($user->id != $this->user()->id){
			return $this->response->error('权限不足', 403);
		}

		return $this->response->collection($user->articles, new ArticleTransformer());
	}

	public function show(Article $article)
	{
		return $this->response->item($article, new ArticleTransformer(true));
	}
}
