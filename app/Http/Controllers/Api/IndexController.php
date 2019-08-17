<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class IndexController extends BaseController
{
	public function index(Request $request)
	{
		return $this->response->array(['msg' => '发布成功']);
	}
}
