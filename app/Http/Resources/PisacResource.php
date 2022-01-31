<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PisacResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='pisac';
    public function toArray($request)
    {
        return[
            'ime'=>$this->resource->ime,
            'prezime'=>$this->resource->prezime,
            'godinaRodjenja'=>$this->resource->godinaRodjenja
        ];
    }
}
