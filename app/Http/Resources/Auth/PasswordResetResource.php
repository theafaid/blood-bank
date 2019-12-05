<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class PasswordResetResource extends JsonResource
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
            'email' => $this->email,
            'token' => $this->token,
        ];
    }
}
