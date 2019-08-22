<?php

/**
 * 我的资料表单请求
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Requests\Admin;

class ProfileRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => 'sometimes|required|max:50',
            'avatar' => 'sometimes|required|url',
            'description' => 'sometimes|nullable|max:250',
            'password' => 'sometimes|required|min:6|confirmed',
        ];
    }
    
    public function attributes()
    {
        return [
            'username' => '用户名',
            'avatar' => '头像',
            'description' => '简介',
            'password' => '新密码',
        ];
    }
}
