<?php

namespace App\Models;

use App\Traits\HasScope;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasScope;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }
}
