<?php

namespace App\Transformers;

use App\Models\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['user', 'category', 'comment'];

	private $show_content;

	public function __construct($show = false)
	{
		$this->show_content = $show;
	}

	public function transform(Article $article)
	{
		$result = [
			'id' => $article->id,
			'title' => $article->title,
			'user_id' => $article->user_id,
			'category_id' => $article->category_id,
			'tag' => explode(',', $article->keyword),
			'description' => $article->description,
			'views' => $article->views,
			'comments' => $article->comments,
			'thumb' => $article->thumb,
			'created_at' => $article->created_at->toDateString(),
			'updated_at' => $article->updated_at->toDateString(),
		];

		if($this->show_content){
			$result['content'] = $article->content;
		}

		return $result;
	}

	public function includeUser(Article $article)
	{
		return $this->item($article->user, new UserTransformer());
	}

	public function includeCategory(Article $article)
	{
		return $this->item($article->category, new CategoryTransformer());
	}

	public function includeComment(Article $article)
	{
		return $this->collection($article->comment, new CommentTransformer());
	}
}
