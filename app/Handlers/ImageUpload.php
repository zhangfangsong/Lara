<?php

namespace App\Handlers;

class ImageUpload
{
	protected $allow_ext = ['jpg', 'jpeg', 'gif', 'png'];

	public function upload($file, $folder, $prefix, $max_width = false)
	{
		$folder = 'uploads/images/'.$folder.'/'.date('Ym/d').'/';
		$upload_path = public_path().'/'.$folder;

		$extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
		$filename = $prefix.'_'.time().'_'.str_random(10).'.'.$extension;

		if(!in_array($extension, $this->allow_ext)){
			return [
				'status' => 1,
				'msg' => '图片上传类型不正确',
			];
		}

		$file->move($upload_path, $filename);

		return [
			'status' => 0,
			'url' => url('/').'/'.$folder.$filename,
			'msg' => '上传成功'
		];
	}
}