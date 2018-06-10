<?php

namespace App\Transformers;

use App\Models\Comment;
use League\Fractal\TransformerAbstract;

class CommentTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['user'];

	public function transform(Comment $comment)
	{
		return [
			'id' => $comment->id,
			'user_id' => (int)$comment->user_id,
			'article_id' => (int)$comment->article_id,
			'content' => $comment->content,
			'created_at' => $comment->created_at->diffForHumans(),
			'updated_at' => $comment->updated_at->diffForHumans(),
		];
	}

	public function includeUser(Comment $comment)
	{
		return $this->item($comment->user, new UserTransformer());
	}
}
