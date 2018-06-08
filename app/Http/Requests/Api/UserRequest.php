<?php

namespace App\Http\Requests\Api;

use Auth;

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
                    'username' => 'required|max:50',
                    'email' => 'required|email|unique:users|max:255',
                    'password' => 'required|confirmed|min:6',
                ];
                break;

            case 'PATCH':
                $id = Auth::guard('api')->id();
                return [
                    'username' => 'required|between:3,25|unique:users,username,'.$id,
                    'email' => 'required|email|unique:users,email,'.$id,
                    'description' => 'max:150',
                    'avatar' => 'url',
                ];
                break;
        }
    }

    public function attributes()
    {
        return [
            'username' => '昵称',
            'description' => '个人简介',
            'avatar' => '头像',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '昵称不能为空',
            'username.between' => '昵称必须介于3-25个字符之间',
            'username.unique' => '昵称已被占用,请重新填写',
        ];
    }
}
