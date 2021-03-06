<?php

namespace App\Http\Requests\Api;

class CommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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