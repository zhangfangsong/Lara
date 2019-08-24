<?php

/**
 * 系统配置表单请求
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Requests\Admin;

class SettingRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'sometimes|required|max:255',
        ];
    }
    
    public function attributes()
    {
        return [
            'name' => '站点名称',
        ];
    }
}
