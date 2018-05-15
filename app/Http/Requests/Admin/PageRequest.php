<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
    public function rules(Page $page)
    {
        return [
            'title' => 'required|max:60',
            'alias' => 'required|max:20|unique:pages',
            'content' => 'required',
        ];
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
