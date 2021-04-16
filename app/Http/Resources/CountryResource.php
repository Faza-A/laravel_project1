<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Models\User;

class CountryResource extends JsonResource
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
            'name'=>$this->name,
            'alpha2_code'=>$this->alpha2_code,
            'alpha3_code'=>$this->alpha3_code,
            'calling_code'=>$this->calling_code,
            'demonym'=>$this->demonym,
            'flag'=>$this->flag,
            'users'=>UserResource::collection($this->user),
        ];
    }
}
