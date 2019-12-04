<?php

namespace App\Repositories\Contracts;

interface ClientRepositoryInterface
{
    /**
     * @param $request
     * @return mixed
     */
    public function store($request);
}
