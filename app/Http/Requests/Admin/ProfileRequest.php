<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'username' => 'sometimes|required|max:50',
            'avatar' => 'sometimes|required|url',
            'description' => 'sometimes|nullable|max:250',
            'password' => 'sometimes|required|min:6|confirmed',
        ];
    }

    public function attributes()
    {
        return [
            'username' => '用户名',
            'avatar' => '头像',
            'description' => '简介',
            'password' => '新密码',
        ];
    }
}
