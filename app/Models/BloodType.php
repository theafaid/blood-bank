<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    protected $guarded = [];

    /**
     * @return mixed
     */
    public function notifiedClients()
    {
        return $this->morphToMany(Client::class, 'clientable');
    }
}
