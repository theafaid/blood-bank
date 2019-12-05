<?php

namespace App\Http\Resources\DonationRequests;

use App\Http\Resources\BloodTypes\BloodTypeResource;
use App\Http\Resources\Cities\CityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DonationRequestResource extends JsonResource
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
            'patient_name' => $this->patient_name,
            'patient_age' => $this->patient_age,
            'blood_type' => new BloodTypeResource($this->bloodType),
            'city' => new CityResource($this->city),
            'hospital_name' => $this->hospital_name,
            'phone_number' => $this->phone_number,
            'location' => $this->location(),
            'created_at' => $this->created_at->diffForHumans(),
            'note' => $this->note,
        ];
    }
}
