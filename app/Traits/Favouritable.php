<?php

namespace App\Traits;

use App\Models\Client;

trait Favouritable
{
    /**
     * @param $client
     * @return mixed
     */
    public function favouritedBy($client)
    {
        return $this->favouritedClients->pluck('pivot.client_id')->contains($client->id);
    }

    /**
     * @param $client
     */
    public function favourite($client)
    {
        $this->favouritedClients()->attach([
            'client_id' => $client->id,
        ]);
    }

    /**
     * @param $client
     */
    public function unfavourite($client)
    {
        $this->favouritedClients()->detach([
            'client_id' => $client->id,
        ]);
    }

    /**
     * @return mixed
     */
    public function favouritedClients()
    {
        return $this->morphToMany(Client::class, 'clientable');
    }
}
