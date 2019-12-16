<?php

namespace App\Repositories\Contracts;

interface PostRepositoryInterface
{
    public function bySearch($query);
}
