<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @param $governorate
     * @return mixed
     */
    public function in($governorate)
    {
        return $this->where('governorate_id', $governorate->id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }
}
