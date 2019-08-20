<?php

/**
 * 分类表单请求
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Requests\Admin;

class CategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'url' => 'nullable|url',
            'pid' => 'required|numeric',
            'sort' => 'required|numeric',
        ];
    }
    
    public function attributes()
    {
        return [
            'name' => '分类名称',
            'pid' => '父级分类',
            'sort' => '分类排序',
            'url' => '分类链接',
        ];
    }
}
