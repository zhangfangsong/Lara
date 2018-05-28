<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Category;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Link;
use View;
use App\Handlers\Level;

class BaseController extends Controller
{
	public function __construct()
	{
		$this->__init();
	}

	protected function __init()
	{
		$cfg = (object)Config::getAll();

		$navs = Category::orderBy('sort', 'desc')->get();
		$level = new Level;
		$navs = $level->formatMulti($navs);

		$hot_articles = Article::getHot();

		$comments = Comment::getRecent();

		$files = [];

		$tags = Tag::getHot();

		$links = Link::getAll();

		View()->share(['cfg'=> $cfg, 'navs'=> $navs, 'hot_articles'=> $hot_articles, 'comments'=> $comments, 'files'=> $files, 'tags'=> $tags, 'links'=> $links]);
	}
}
