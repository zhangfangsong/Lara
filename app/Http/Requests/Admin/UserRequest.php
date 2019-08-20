<?php

/**
 * 用户表单请求
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Requests\Admin;

class UserRequest extends FormRequest
{
    public function rules()
    {
        $method = $this->method();

        $rules = [
            'username' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6',
        ];

        if($method == 'PATCH'){
            $rules['email'] = 'required|email|unique:users,id,'.request()->user->id.'|max:255';
            $rules['password'] = 'nullable|min:6';
        }

        return $rules;
    }
    
    public function attributes()
    {
        return [
            'username' => '用户名',
        ];
    }
}
