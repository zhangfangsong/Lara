<?php

namespace App\Handlers;

use Storage;

class App
{
	public function getAvatarByEmail($email)
	{
		$path = 'avatar/'.date('Ym').'/'.time().'.jpg';
		$hash = md5(strtolower(trim($email)));
		Storage::disk('upload')->put($path, file_get_contents("http://www.gravatar.com/avatar/$hash?s=400&d=monsterid"));

		return url('/').'/uploads/images/'.$path;
	}
}
