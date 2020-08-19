<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class CaptchasController extends BaseController
{
	public function store(Request $request, CaptchaBuilder $builder)
    {
        $key = 'captcha-'.Str::random(15);

        $captcha = $builder->build();
        $expires = now()->addMinutes(5);
    	Cache::put($key, ['code' => $captcha->getPhrase()], $expires);

        $result = [
            'captcha_key' => $key,
            'expired_at'  => $expires->toDateTimeString(),
            'captcha_image' => $captcha->inline()
        ];
        
        return response()->json($result)->setStatusCode(201);
    }
}
