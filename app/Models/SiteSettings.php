<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $casts = [
        'mobile_store_urls' => 'array',
        'social_links' => 'array',
    ];
}
