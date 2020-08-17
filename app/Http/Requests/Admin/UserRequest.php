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
        switch ($this->method()) {
            case 'POST':
                return [
                    'username' => 'required|max:50|unique:users',
                    'email' => 'required|email|unique:users|max:255',
                    'password' => 'required|min:6',
                ];
                break;
            
            case 'PATCH':
                $user_id = request()->user->id;
				
                return [
                    'username' => 'required|max:50|unique:users,username,'.$user_id,
                    'email' => 'required|max:255|email|unique:users,email,'.$user_id,
                    'password' => 'min:6',
                ];
                break;
                
            default:
                break;
        }
    }
    
    public function attributes()
    {
        return [
            'username' => '用户名',
            'email' => '邮箱',
            'password' => '密码',
        ];
    }
}
