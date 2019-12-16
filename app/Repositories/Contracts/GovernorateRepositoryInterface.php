<?php

namespace App\Repositories\Contracts;

interface GovernorateRepositoryInterface
{
    public function all();
    public function store($data);
    public function update($governorate, $data);
}
