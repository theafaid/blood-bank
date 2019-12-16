<?php

namespace App\Models;

use App\Traits\HasNotifiedClients;
use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    use HasNotifiedClients;

    protected $guarded = [];
}
