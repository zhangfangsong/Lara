<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Transformers\CategoryTransformer;

class CategoryController extends BaseController
{
	public function index()
	{
		return $this->response->collection(Category::getAppCategory(), new CategoryTransformer);
	}
}
