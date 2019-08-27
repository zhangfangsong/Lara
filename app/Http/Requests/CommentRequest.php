<?php

/**
 * 评论表单请求
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Requests;

class CommentRequest extends Admin\FormRequest
{
    public function rules()
    {
        return [
            'content' => 'required|max:255',
        ];
    }
    
    public function attributes()
    {
        return [
            'content' => '评论内容',
        ];
    }
}
