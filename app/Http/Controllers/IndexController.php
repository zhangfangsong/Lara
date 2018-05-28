<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Handlers\Level;

class IndexController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$list = Article::getRecent();
		if($list->count()){
			foreach($list as $key => $val){
				if($val->keyword){
					$list[$key]->keyword = explode(',', $val->keyword);
				}
			}
		}
		return view('index.index', ['list'=> $list]);
	}

	public function category(Category $category, Level $level)
	{
		$categorys = Category::all();
		$childs_id_arr = $level->formatChild($categorys, $category->id);
		$list = Article::where('status', 1)->whereIn('category_id', $childs_id_arr)->orderBy('id', 'desc')->paginate(10);
		if($list->count()){
			foreach($list as $key => $val){
				if($val->keyword){
					$list[$key]->keyword = explode(',', $val->keyword);
				}
			}
		}

		return view('index.category', ['list'=>$list, 'category'=>$category]);
	}

	public function article(Article $article)
	{
		dd($article->comments);
		return view('index.article', ['article'=> $article]);
	}
}
