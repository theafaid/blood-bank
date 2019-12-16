<?php

namespace App\Http\Resources\Cities;

use App\Http\Resources\Governorates\GovernorateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'governorate' => new GovernorateResource($this->governorate),
        ];
    }
}
