<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientable extends Model
{
    public function subject()
    {
        return $this->morphTo();
    }
}
