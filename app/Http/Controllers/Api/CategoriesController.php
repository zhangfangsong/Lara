<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoriesController extends BaseController
{
	public function index(Request $request)
	{
		CategoryResource::wrap('data');
		return CategoryResource::collection(Category::getAppCategory());
	}
}