<?php

/**
 * 节点表单请求
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Requests\Admin;

class NodeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'  => 'required|max:50',
            'alias' => 'required|max:30',
        ];
    }
    
    public function attributes()
    {
        return [
            'name'  => '节点名称',
            'alias' => '节点路由',
        ];
    }
}
