<?php

namespace App\Http\Resources\Posts;

use App\Http\Resources\Categories\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'body' => $this->body,
            'thumbnail' => $this->thumbnail,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
