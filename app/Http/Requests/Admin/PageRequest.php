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
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'title' => 'required|max:60',
                    'alias' => 'required|max:30|unique:pages',
                    'content' => 'required',
                ];
                break;
                
            case 'PATCH':
                $id = $this->page->id;
                
                return [
                    'title' => 'required|max:60',
                    'alias' => 'required|max:30|unique:pages,alias,'.$id.',id',
                    'content' => 'required',
                ];
                break;
                
            default:
                break;
        }
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
