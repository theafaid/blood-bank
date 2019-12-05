<?php

namespace App\Repositories\Contracts;

interface PostRepositoryInterface
{
    /**
     * @return mixed
     */
    public function paginated($limit = 15);
}
