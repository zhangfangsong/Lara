<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

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
            'captcha' => 'required',
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
