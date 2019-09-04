<?php

/**
 * 后台基类控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Node;
use App\Handlers\Level;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class BaseController extends Controller
{
	protected $action;

	//构造函数
	public function __construct()
	{
		$this->__init();
	}

	//初始化
	protected function __init()
	{
		//模块
		$route = Route::currentRouteName();
		$routeArr = explode('.', $route);
		$module = $routeArr[1];
		
		$this->action = $routeArr[2] ?? '';
		
		if($module != 'dashboard' && $module != 'setting'){
			$module = 'manage';
		}
		
		//导航
		$navs = Node::where('sidebar', 1)->get();
		$level = new Level;
		$navs = $level->formatMulti($navs);

		View()->share(['route' => $route, 'module' => $module,'navs' => $navs]);
	}
}
