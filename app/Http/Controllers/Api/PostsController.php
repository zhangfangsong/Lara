<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\PostRequest;
use App\Models\Post;
use App\Http\Resources\PostResource;

class PostsController extends BaseController
{
	//发布文章
	public function store(PostRequest $request, Post $post)
	{
		$post->fill($request->only(['title', 'category_id', 'content', 'thumb', 'keyword', 'description']));
		$post->user_id = auth('api')->id();
		$post->save();

		return new PostResource($post);
	}

	//编辑文章
	public function update(PostRequest $request, Post $post)
	{
		$this->authorize('update', $post);

		$post->update($request->only(['title', 'category_id', 'content', 'thumb', 'keyword', 'description']));
		return new PostResource($post);
	}

	//删除文章
	public function destroy(Request $request, Post $post)
	{
		$this->authorize('destroy', $post);
		
		$post->delete();
		return response(null, 204);
	}
}
