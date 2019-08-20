<?php

/**
 * 角色表单请求
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Requests\Admin;

class RoleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:50',
        ];
    }
    
    public function attributes()
    {
        return [
            'name' => '角色名称',
        ];
    }
}
