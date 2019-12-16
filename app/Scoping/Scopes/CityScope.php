<?php

namespace App\Scoping\Scopes;

use App\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class CityScope implements Scope
{
    /**
     * @param Builder $builder
     * @param $value
     * @return Builder
     */
    public function apply(Builder $builder, $value)
    {
        return $builder->whereHas('city', function ($query) use ($value) {
            return $query->where('id', $value);
        });
    }
}
    
