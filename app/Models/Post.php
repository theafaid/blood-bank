<?php

namespace App\Models;

use App\Traits\Favouritable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Favouritable;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $with = ['category'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
