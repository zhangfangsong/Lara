<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NodeRequest extends FormRequest
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
