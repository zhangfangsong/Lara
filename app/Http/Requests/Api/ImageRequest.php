<?php

namespace App\Http\Requests\Api;

class ImageRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'type' => 'required|string|in:avatar,post,thumb',
        ];

        if($this->type == 'avatar') {
            $rules['image'] = 'required|mimes:jpg,jpeg,png,gif|dimensions:min_width=200,min_height=200';
        } else {
            $rules['image'] = 'required|mimes:jpg,jpeg,png,gif';
        }

        return $rules;
    }
    
    public function messages()
    {
        return [
            'image.dimensions' => '图片的清晰度不够，宽和高需要 200px 以上',
        ];
    }
}