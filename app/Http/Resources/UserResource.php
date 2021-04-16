<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CountryResource;
use App\Models\Country;

class UserResource extends JsonResource
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
            'name'=> $this->first_name ." ". $this->last_name,
            'email'=>$this->email,
            'phone_number'=>$this->phone_number,
            'gender'=>$this->gender,
            'country_id'=> $this->country,
        ];
    }
}
