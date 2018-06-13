<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Collection;
use App\Transformers\CollectionTransformer;
use App\Transformers\ArticleTransformer;

class CollectionController extends BaseController
{
	public function store(Article $article, Collection $collection)
	{
		$user_id = $this->user()->id;
		$article_id = $article->id;

		$data = Collection::getOne($user_id, $article_id);

		if(empty($data)){
			$collection->article_id = $article->id;
			$collection->user_id = $this->user()->id;
			$collection->save();
		}else{
			$collection = $data;
		}

		return $this->response->item($collection, new CollectionTransformer());
	}

	public function index()
	{
		$articles = $this->user()->collections()->get();
		return $this->response->collection($articles, new ArticleTransformer());
	}

	public function articleIds()
	{
		$user_id = $this->user()->id;
		$article_ids = Collection::where(['user_id'=>$user_id])->pluck('article_id');

		return $article_ids;
	}
}
