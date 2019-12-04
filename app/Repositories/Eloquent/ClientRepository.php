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
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->clients->store($data);
    }
}
