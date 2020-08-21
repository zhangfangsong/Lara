<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\PostRequest;
use App\Models\Post;
use App\Models\User;
use App\Http\Resources\PostResource;
use App\Http\Queries\PostQuery;

class PostsController extends BaseController
{
	//文章列表
	public function index(Request $request, PostQuery $query)
	{
		$posts = $query->paginate($request->page_size ?: 10);
		return PostResource::collection($posts);
	}

	//用户发布的文章
	public function userIndex(Request $request, User $user, PostQuery $query)
	{		
		$posts = $query->where('user_id', $user->id)->paginate($request->page_size ?: 10);
		return PostResource::collection($posts);
	}

	//文章详情
	public function show($post_id, PostQuery $query)
	{
		$post = $query->findOrFail($post_id);
		return (new PostResource($post))->showContent();
	}

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
