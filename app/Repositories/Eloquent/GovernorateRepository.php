<?php

namespace App\Repositories\Eloquent;

use App\Models\Client;
use App\Models\Governorate;
use App\Repositories\Contracts\GovernorateRepositoryInterface;

class GovernorateRepository implements GovernorateRepositoryInterface
{
    /**
     * @var Client
     */
    protected $governorates;

    /**
     * GovernorateRepository constructor.
     * @param Governorate $governorates
     */
    public function __construct(Governorate $governorates)
    {
        $this->governorates = $governorates;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->governorates->all();
    }
}
