<?php

/**
 * 标签表单请求
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Requests\Admin;

class TagRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:32',
            'status' => 'required|numeric',
        ];
    }
    
    public function attributes()
    {
        return [
            'name' => '名称',
            'status' => '状态',
        ];
    }
}
