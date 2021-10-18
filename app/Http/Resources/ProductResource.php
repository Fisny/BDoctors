<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'price'=>$this->price,
            'description'=>$this->description,
            'name'=>$this->name,
            'duration'=>$this->duration
        ];
        // return parent::toArray($request);
    }
}
