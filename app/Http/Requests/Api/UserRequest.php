<?php

namespace App\Http\Requests\Api;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|between:2,25|unique:users,username',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
            // 'captcha' => 'required',
        ];
    }
    
    public function attributes()
    {
        return [
            'username' => '昵称',
            'captcha'  => '验证码',
        ];
    }
}
