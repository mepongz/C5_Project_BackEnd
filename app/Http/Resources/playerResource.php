<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class playerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function with($request){
        return [
            'version' => '1.0.0',
            'author' => 'cartoneros.meffrey@gmail.com',
        ];
    }
}
