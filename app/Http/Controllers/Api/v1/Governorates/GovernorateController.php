<?php

namespace App\Http\Controllers\Api\v1\Governorates;

use App\Http\Controllers\Controller;
use App\Http\Resources\Governorates\GovernorateResource;
use App\Repositories\Contracts\GovernorateRepositoryInterface;

class GovernorateController extends Controller
{
    /**
     * @var GovernorateRepositoryInterface
     */
    protected $governorates;

    /**
     * GovernorateController constructor.
     * @param GovernorateRepositoryInterface $governorates
     */
    public function __construct(GovernorateRepositoryInterface $governorates)
    {
        $this->middleware('auth:api');

        $this->governorates = $governorates;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke()
    {
        return GovernorateResource::collection(
            $this->governorates->all()
        );
    }
}
