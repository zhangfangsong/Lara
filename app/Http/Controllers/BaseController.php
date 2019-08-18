<?php

/**
 * 基类控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Link;
use View;
use App\Handlers\Level;

class BaseController extends Controller
{
	//构造函数
	public function __construct()
	{
		$this->__init();
	}

	//初始化
	protected function __init()
	{
		$cfg = (object)Setting::getAll();
		
		$navs = Category::where('status', 1)->orderBy('sort', 'desc')->get();
		$level = new Level;
		$navs = $level->formatMulti($navs);

		$hot_articles = Post::getHot();
		$recent_articles = Post::getRecent();

		// $comments = Comment::getRecent();

		$files = Post::getFile();

		$tags = Tag::getHot(80)->shuffle();

		$links = Link::getAll();

		View()->share(['cfg'=> $cfg, 'navs'=> $navs, 'hot_articles'=> $hot_articles, 'recent_articles'=> $recent_articles, 'files'=> $files, 'tags'=> $tags, 'links'=> $links]);
	}
}
