<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\PostRequest;
use App\Models\Post;
use App\Models\User;
use App\Http\Resources\PostResource;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class PostsController extends BaseController
{
	//文章列表
	public function index(Request $request, Post $post)
	{
		$posts = QueryBuilder::for(Post::class)
			->allowedIncludes('user', 'category')
			->allowedFilters([
				'title',
				AllowedFilter::exact('category_id'),
				AllowedFilter::scope('withOrder')->default('recent')
			])->paginate($request->page_size ?: 10);

		return PostResource::collection($posts);
	}

	//用户发布的文章
	public function userIndex(Request $request, User $user)
	{
		$query = $user->posts()->getQuery();
		
		$posts = QueryBuilder::for($query)
			->allowedIncludes('user', 'category')
			->allowedFilters([
				'title',
				AllowedFilter::exact('category_id'),
				AllowedFilter::scope('withOrder')->default('recent')
			])->paginate($request->page_size ?: 10);

		return PostResource::collection($posts);
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
