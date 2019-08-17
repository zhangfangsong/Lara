<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\ImageRequest;
use App\Handlers\ImageUpload;

class ImageController extends BaseController
{
	public function store(ImageRequest $request, ImageUpload $upload)
	{
		$result = $upload->upload($request->image, 'avatar', 'av', 600);
		return $this->response->array($result)->setStatusCode(201);
	}
}
