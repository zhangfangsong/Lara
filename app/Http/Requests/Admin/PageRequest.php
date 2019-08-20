<?php

/**
 * 单页表单请求
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Requests\Admin;

class PageRequest extends FormRequest
{
    public function rules(Page $page)
    {
        return [
            'title' => 'required|max:60',
            'alias' => 'required|max:20|unique:pages',
            'content' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '标题',
            'alias' => '别名',
            'content' => '内容',
        ];
    }
}
