<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use App\Http\Requests\Api\CommentRequest;
use App\Transformers\CommentTransformer;

class CommentController extends BaseController
{
	public function index(Article $article)
	{
		$comments = $article->comment()->paginate(10);
		return $this->response->paginator($comments, new CommentTransformer());
	}

	public function store(CommentRequest $request, Article $article, Comment $comment)
	{
		$comment->content = $request->content;
		$comment->article_id = $article->id;
		$comment->user_id = $this->user()->id;
		$comment->at_id = 0;
		$comment->ip = $request->getClientIp();
		$comment->save();

		return $this->response->item($comment, new CommentTransformer())->setStatusCode(201);
	}

	public function destroy(Article $article, Comment $comment)
	{
		if($article->id != $comment->article_id){
			return $this->response->errorBadRequest();
		}

		$this->authorize('destroy', $comment);
		$comment->delete();

		return $this->response->noContent();
	}
}
