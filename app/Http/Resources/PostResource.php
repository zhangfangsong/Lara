<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    //是否显示内容字段
    protected $showContent = false;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if(!$this->showContent) {
            $this->resource->addHidden(['content']);
        }
        $data = parent::toArray($request);

        $data['user'] = new UserResource($this->whenLoaded('user'));
        $data['category'] = new CategoryResource($this->whenLoaded('category'));
        
        return $data;
    }
    
    public function showContent()
    {
        $this->showContent = true;
        return $this;
    }
}