<?php

namespace App\Models;

use App\Traits\HasScope;
use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    use HasScope;
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

    /**
     * @return mixed
     */
    public function governorate()
    {
        return $this->city->governorate;
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
