<?php

namespace App\Repositories\Eloquent;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    /**
     * @var Client
     */
    protected $clients;

    /**
     * ClientRepository constructor.
     * @param Client $clients
     */
    public function __construct(Client $clients)
    {
        $this->clients = $clients;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, ...$arguments)
    {
        return $this->$name(...$arguments);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->clients->create($data);
    }

    /**
     * @param $client
     * @param $data
     * @return mixed
     */
    public function update($client, $data)
    {
        if(isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        return $client->update($data);
    }
}
