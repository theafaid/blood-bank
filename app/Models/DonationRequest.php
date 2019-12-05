<?php

namespace App\Models;

use App\Scoping\Scoper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return string
     */
    public function location()
    {
        return "{$this->lat},{$this->lng}";
    }

    public function scopeWithScopes(Builder $builder, $scopes = [])
    {
        return (new Scoper(request()))->apply($builder, $scopes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
