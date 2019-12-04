<?php

namespace App\Http\Resources\Clients;

use App\Http\Resources\Cities\CityResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BloodTypes\BloodTypeResource;

class ClientPrivateResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'dob' => $this->dob,
            'last_donation_date' => $this->last_donation_date,
            'phone_number' => $this->phone_number,
            'blood_type' => new BloodTypeResource($this->bloodType),
            'city' => new CityResource($this->city),
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
