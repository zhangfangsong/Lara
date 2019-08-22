<?php

/**
 * 图片上传
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Handlers;

class ImageUpload
{
	protected $allow_ext = ['jpg', 'jpeg', 'gif', 'png'];

	public function upload($file, $folder, $max_width = false)
	{
		$folder = 'uploads/images/'.$folder.'/'.date('Ym').'/';
		$upload_path = public_path().'/'.$folder;

		$extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
		$filename  = time().'.'.$extension;

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
