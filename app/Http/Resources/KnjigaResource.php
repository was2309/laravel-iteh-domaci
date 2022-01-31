<?php

namespace App\Http\Resources;

use App\Models\Pisac;
use Illuminate\Http\Resources\Json\JsonResource;

class KnjigaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'naslov'=>$this->resource->naslov,
            'zanr'=>$this->resource->zanr,
            'kategorija'=> new KategorijaResource($this->resource->kategorija),
            'pisac'=> new PisacResource($this->resource->pisac),
            'user'=> new UserResource($this->resource->user)
        ];
    }
}
