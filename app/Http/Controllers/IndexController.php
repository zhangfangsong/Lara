<?php

/**
 * 首页控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Handlers\Level;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class IndexController extends BaseController
{
	//首页
	public function index()
	{
		$list = $this->recent_posts;
		return view('index.index', ['list'=> $list]);
	}
	
	//列表
	public function category(Category $category, Level $level)
	{
		$categorys = Category::all();
		$childs_id_arr = $level->formatChild($categorys, $category->id);
		$list = Post::where('status', 1)->whereIn('category_id', $childs_id_arr)->with('category')->orderBy('id', 'desc')->paginate(10);

		return view('index.category', ['list'=>$list, 'category'=>$category]);
	}

	//详情
	public function post(Post $post)
	{
		$post->load('category');
		Post::where('id', $post->id)->increment('views');
		return view('index.post', ['post'=> $post, 'comments' => $post->comments()->with('user')->where('status', 1)->get()]);
	}
	
	//评论
	public function comment(Post $post, CommentRequest $request)
	{
		$user = Auth::user();
		
		//防刷评论
		$cache_key = $user->id . ':' . $post->id;
		
		if(Cache::get($cache_key)) {
			return redirect()->back()->with('danger', '评论的间隔时间太短');
		}
		
		Comment::create([
			'user_id' => $user->id,
			'post_id' => $post->id,
			'content' => $request->content,
			'at_id'   => 0,
			'ip'      => $request->getClientIp(),
			'read'    => 0,
			'status'  => 1
		]);
		Cache::put($cache_key, true, 5);
		
		return redirect()->back()->with('success', '评论成功');
	}
	
	//搜索
	public function search(Request $request)
	{
		$data = Post::getSearch($request);
		return view('index.search', $data);
	}
}