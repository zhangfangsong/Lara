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
        switch ($this->method()) {
            case 'POST':
                return [
                    'username' => 'required|between:2,25|unique:users,username',
                    'email' => 'required|email|unique:users|max:255',
                    'password' => 'required|confirmed|min:6',
                    'captcha_key'  => 'required|string',
                    'captcha_code' => 'required|string',
                ];
                break;

            case 'PATCH':
                $user_id = auth('api')->id();

                return [
                    'username' => 'max:50|unique:users,username,'.$user_id,
                    'email'    => 'max:255|email|unique:users,email,'.$user_id,
                    'description' => 'max:150',
                    'avatar' => 'url',
                ];
                break;
        }
    }

    public function attributes()
    {
        return [
            'avatar'       => '头像',
            'username'     => '昵称',
            'captcha_key'  => '图片验证码 KEY',
            'captcha_code' => '图片验证码',
            'description'  => '个人简介',
        ];
    }
}
