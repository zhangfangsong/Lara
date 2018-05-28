<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class IndexController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$list = Article::getRecent();
		if($list->count()){
			foreach($list as $key => $val){
				if($val->keyword){
					$list[$key]->keyword = explode(',', $val->keyword);
				}
			}
		}
		return view('index.index', ['list'=> $list]);
	}
}
