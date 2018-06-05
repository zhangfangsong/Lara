<?php

namespace App\Http\Requests\Api;

use Dingo\Api\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'image' => 'required|mimes:jpg,jpeg,png,gif|dimensions:min_width=200,min_height=200',
        ];
    }

    public function messages()
    {
        return [
            'image.dimensions' => '请上传200*200以上的图片',
        ];
    }
}
