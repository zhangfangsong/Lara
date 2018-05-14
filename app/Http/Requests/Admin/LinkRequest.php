<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
            'url' => 'required|url',
            'sort' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名称',
            'url' => '链接地址',
            'sort' => '排序',
        ];
    }
}
