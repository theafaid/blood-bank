<?php

namespace App\Http\Resources\Notifications;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'title' => $this->data['title'],
            'description' => $this->data['description'],
            'created_at' => $this->created_at->diffForHumans(),
            'id' => $this->id,
        ];
    }
}
