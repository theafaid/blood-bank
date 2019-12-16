<?php

namespace App\Models;

use App\Traits\Favouritable;
use App\Traits\HasScope;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Favouritable, HasScope;

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
