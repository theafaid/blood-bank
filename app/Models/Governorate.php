<?php

namespace App\Models;

use App\Traits\HasNotifiedClients;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    use HasNotifiedClients;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
