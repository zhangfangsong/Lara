<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    //是否显示敏感字段
    protected $showSensitiveFields = false;

    public function toArray($request)
    {
        if(!$this->showSensitiveFields) {
            $this->resource->addHidden(['email']);
        }
        $data = parent::toArray($request);
        $data['role'] = new RoleResource($this->whenLoaded('role'));
        
        return $data;
    }
    
    public function showSensitiveFields()
    {
        $this->showSensitiveFields = true;
        return $this;
    }
}