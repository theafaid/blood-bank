<?php

namespace App\Models;

use App\Traits\Favouritable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    use Favouritable;
}
