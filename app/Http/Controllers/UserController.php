<?php

/**
 * 注册控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Str;
use Mail;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
	//注册页面
	public function create()
	{
		return view('users.create');
	}

	//注册操作
	public function store(UserRequest $request)
	{
		$code = session('code');
		if(!$code || (!PhraseBuilder::comparePhrases($code, $request->captcha))) {
			session()->flash('danger', '验证码不正确');
			return redirect()->back();
		}

		$user = User::add([
			'username' => $request->username,
			'email' => $request->email,
			'password' => $request->password,
			'activation_token' => Str::random(80)
		]);

		//发送激活邮件
		$this->sendConfirmEmail($user);
		session()->flash('success', '激活邮件已发送到你的注册邮箱上，请注意查收');
		return redirect()->route('login');
	}

	protected function sendConfirmEmail($user)
	{
		$cfg = $this->cfg;
		$to = $user->email;
		$data = compact('user', 'cfg');
		$subject = "感谢注册 ".$cfg->title."！请确认你的邮箱";

		Mail::send('emails.confirm', $data, function ($msg) use ($to, $subject) {
			$msg->to($to)->subject($subject);
		});
	}

	//激活邮箱
	public function confirmEmail(Request $request, $token)
	{
		$user = User::where('activation_token', $token)->first();

		if(!$user || $user->activated) {
			session()->flash('danger', '非法操作');
		} else {
			$user->activation_token = '';
			$user->activated = 1;
			$user->save();

			Auth::login($user);
			session()->flash('success', '恭喜，账号激活成功');
		}
		
		return view('shared.message');
	}
}
