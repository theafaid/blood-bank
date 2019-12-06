<?php

namespace App\Http\Resources\SiteSettings;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteSettingResource extends JsonResource
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
            'mobile_store_urls' => $this->mobile_store_urls,
            'notification_text' => $this->welcome_page_text,
            'about' => $this->about,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'social_links' => $this->social_links,
        ];
    }
}
