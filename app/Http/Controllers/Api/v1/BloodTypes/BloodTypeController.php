<?php

namespace App\Http\Controllers\Api\v1\BloodTypes;

use App\Http\Controllers\Controller;
use App\Http\Resources\BloodTypes\BloodTypeResource;
use App\Repositories\Contracts\BloodTypeRepositoryInterface;

class BloodTypeController extends Controller
{
    /**
     * BloodTypeController constructor.
     * @param BloodTypeRepositoryInterface $bloodTypes
     */
    public function __construct(BloodTypeRepositoryInterface $bloodTypes)
    {
        $this->middleware('auth:api');

        $this->bloodTypes = $bloodTypes;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke()
    {
        return BloodTypeResource::collection($this->bloodTypes->all());
    }
}
