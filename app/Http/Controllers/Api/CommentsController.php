<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\CommentRequest;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Resources\CommentResource;

class CommentsController extends BaseController
{
	//发布评论
	public function store(CommentRequest $request, Post $post, Comment $comment)
	{
		$comment->content = $request->content;
		$comment->user()->associate($request->user());
		$comment->post()->associate($post);
		$comment->ip = $request->getClientIp();
		$comment->status = 1;
		$comment->save();

		return new CommentResource($comment);
	}

	//删除评论
	public function destroy(Post $post, Comment $comment)
	{
		if($comment->post_id != $post->id) {
			abort(404);
		}
		$this->authorize('destroy', $comment);
		$comment->delete();
		
		return response(null, 204);
	}
}
