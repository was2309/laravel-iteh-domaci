<?php

namespace App\Http\Resources;

use App\Models\Pisac;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\KategorijaResource;
use App\Http\Resources\PisacResource;
use App\Http\Resources\UserResource;

class KnjigaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='knjiga';
    public function toArray($request)
    {
        return [
            'naslov'=>$this->resource->naslov,
            'izdavac'=>$this->resource->izdavac,
            'kategorija_id'=> new KategorijaResource($this->resource->kategorija),
            'pisac_id'=> new PisacResource($this->resource->pisac),
            'user'=> new UserResource($this->resource->user)
        ];
    }
}
