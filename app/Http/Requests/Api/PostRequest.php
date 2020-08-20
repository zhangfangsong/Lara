<?php

namespace App\Http\Requests\Api;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:80',
            'category_id' => 'required|numeric|exists:categories,id',
            'content' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '标题',
            'category_id' => '分类',
            'content' => '内容'
        ];
    }
}
