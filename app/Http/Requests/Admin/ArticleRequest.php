<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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
