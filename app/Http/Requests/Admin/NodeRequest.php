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
            'title' => 'required|max:20',
            'alias' => 'required|max:20',
            'name'  => 'required|max:50',
        ];
    }
    
    public function attributes()
    {
        return [
            'title' => '节点标题',
            'alias' => '节点别名',
            'name'  => '路由名称',
        ];
    }
}
