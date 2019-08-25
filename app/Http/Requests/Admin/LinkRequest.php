<?php

/**
 * 友链表单请求
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Requests\Admin;

class LinkRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:60',
            'url' => 'required|url',
            'sort' => 'numeric',
        ];
    }
    
    public function attributes()
    {
        return [
            'name' => '链接名称',
            'url' => '链接地址',
            'sort' => '排序',
        ];
    }
}
