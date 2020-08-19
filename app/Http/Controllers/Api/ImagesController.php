<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\ImageRequest;
use App\Handlers\ImageUpload;

class ImagesController extends BaseController
{
	//图片上传
	public function store(ImageRequest $request, ImageUpload $upload)
	{
		$type  = $request->type;
		$image = $request->image;
		$result= $upload->upload($image, $type);

		return response()->json($result)->setStatusCode(201);
	}
}