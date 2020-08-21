<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\CommentRequest;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Resources\CommentResource;
use App\Http\Queries\CommentQuery;

class CommentsController extends BaseController
{
	//文章评论
	public function index($post_id, CommentQuery $query)
	{
		$comments = $query->where('post_id', $post_id)->paginate();
		return CommentResource::collection($comments);
	}

	//用户评论
	public function userIndex($user_id, CommentQuery $query)
	{
		$comments = $query->where('user_id', $user_id)->paginate();
		return CommentResource::collection($comments);
	}
	
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
