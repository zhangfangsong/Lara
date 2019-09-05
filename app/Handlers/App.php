<?php

/**
 * 生成用户头像
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Handlers;

use Illuminate\Support\Facades\Storage;

class App
{
	public function getAvatarByEmail($email)
	{
		$path = '/avatar/'.date('Ym');
		$dir  = public_path('uploads/images'.$path);

		if(!is_dir($dir)) {
			mkdir($dir, 0777, true);
		}
		$file = $path.'/'.time().'.jpg';
		
		$hash = md5(strtolower(trim($email)));
		Storage::disk('upload')->put($file, file_get_contents("http://www.gravatar.com/avatar/$hash?s=400&d=monsterid"));
		
		return url('/').'/uploads/images/'.$file;
	}
}
