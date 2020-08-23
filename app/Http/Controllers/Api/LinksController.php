<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\LinkResource;
use App\Models\Link;

class LinksController extends BaseController
{
	//友链列表
	public function index(Request $request)
	{
		$links = Link::getAll();
		LinkResource::wrap('data');
		return LinkResource::collection($links);
	}
}