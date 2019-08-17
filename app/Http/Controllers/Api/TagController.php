<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Article;
use App\Transformers\TagTransformer;

class TagController extends BaseController
{
	public function index(Request $request)
	{
		$map = [
			'status' => 1
		];

		$tags = Tag::where($map)->orderBy('views', 'desc')->get();
		if($tags->count()){
			foreach($tags as $key => $val){
				$tags[$key]->article_count = Article::where([['keyword','like','%'.$val->name.'%']])->count();
			}
		}

		return $this->response->collection($tags, new TagTransformer());
	}
}
