<?php

namespace App\Traits;

use App\Models\Client;

trait HasNotifiedClients
{
    /**
     * @return mixed
     */
    public function notifiedClients()
    {
        return $this->morphToMany(Client::class, 'clientable');
    }
}
