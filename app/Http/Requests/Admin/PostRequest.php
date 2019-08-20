<?php

/**
 * 文章表单请求
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Requests\Admin;

class PostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|max:60',
            'category_id' => 'required|numeric',
            'content' => 'required',
            'views' => 'nullable|numeric',
        ];
    }
    
    public function attributes()
    {
        return [
            'title' => '标题',
            'category_id' => '分类',
            'content' => '内容',
            'views' => '浏览量',
        ];
    }
}
