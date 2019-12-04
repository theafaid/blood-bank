<?php

namespace App\Repositories\Eloquent;

use App\Models\BloodType;
use App\Repositories\Contracts\BloodTypeRepositoryInterface;

class BloodTypeRepository implements BloodTypeRepositoryInterface
{
    /**
     * @var BloodType
     */
    protected $bloodTypes;

    /**
     * BloodType constructor.
     * @param BloodType $bloodTypes
     */
    public function __construct(BloodType $bloodTypes)
    {
        $this->bloodTypes = $bloodTypes;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->bloodTypes->all();
    }
}
