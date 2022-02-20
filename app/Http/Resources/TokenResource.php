<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'tokenable_type' =>$this->tokenable_type,
            'tokenable_id' =>$this->tokenable_id,
            'name'=>$this->name,
            'token'=>$this->token,
        ];
    }
}
