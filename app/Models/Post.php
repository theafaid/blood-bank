<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function favouritedClients()
    {
        return $this->morphToMany(Client::class, 'clientable');
    }
}
