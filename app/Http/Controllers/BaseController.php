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
use App\Handlers\Level;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
	protected $cfg = null;
	
	protected $recent_posts = null;

	//构造函数
	public function __construct()
	{
		$this->__init();
	}

	//初始化
	protected function __init()
	{
		//系统配置
		$cfg = (object)Setting::getAll();
		$this->cfg = $cfg;
		
		//导航
		$navs = Category::where('status', 1)->orderBy('sort', 'desc')->get();
		$level = new Level;
		$navs = $level->formatMulti($navs);

		//热门文章和最新文章
		$hot_posts = Post::getHot();
		$recent_posts = Post::getRecent();
		$this->recent_posts = $recent_posts;
		
		//归档
		$files = Post::getFile();
		
		//标签
		$tags = Tag::getHot(80)->shuffle();
		
		//友链
		$links = Link::getAll();
		
		View()->share(compact('cfg', 'navs', 'hot_posts', 'recent_posts', 'files', 'tags', 'links'));
	}
}
