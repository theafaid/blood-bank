<?php

namespace App\Traits;

use App\Scoping\Scoper;
use Illuminate\Database\Eloquent\Builder;

trait HasScope
{
    /**
     * @param Builder $builder
     * @param array $scopes
     * @return Builder
     */
    public function scopeWithScopes(Builder $builder, $scopes = [])
    {
        return (new Scoper(request()))->apply($builder, $scopes);
    }
}
