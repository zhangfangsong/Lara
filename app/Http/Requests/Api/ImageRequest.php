<?php

namespace App\Http\Requests\Api;

class ImageRequest extends FormRequest
{
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
