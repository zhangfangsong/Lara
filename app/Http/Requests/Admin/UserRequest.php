<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $method = $this->method();

        $rules = [
            'username' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6',
        ];

        if($method == 'PATCH'){
            $rules['email'] = 'required|email|unique:users,id,'.request()->user->id.'|max:255';
            $rules['password'] = 'nullable|min:6';
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'username' => '用户名',
        ];
    }
}
