<?php

namespace App\Repositories\Contracts;

interface DonationRequestRepositoryInterface
{
    /**
     * @return mixed
     */
    public function store($data);
}
