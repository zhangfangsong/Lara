<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|max:50',
            'url' => 'nullable|url',
            'pid' => 'required|numeric',
            'sort' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '分类名称',
            'pid' => '父级分类',
            'sort' => '分类排序',
            'url' => '分类链接',
        ];
    }
}
