<?php

/**
 * 验证码
 * User: zfs
 * Date: 2020/8/14
 * Time: 11:39
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;

class CaptchaController extends Controller
{
	public function store(Request $request, CaptchaBuilder $builder)
	{
		session(['code' => $builder->getPhrase()]);
		
		header('Content-Type: image/jpeg');
		return $builder->build()->output();
	}
}
