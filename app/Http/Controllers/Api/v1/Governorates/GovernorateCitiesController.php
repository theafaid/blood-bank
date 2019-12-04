<?php

namespace App\Http\Controllers\Api\v1\Governorates;

use App\Models\Governorate;
use App\Http\Controllers\Controller;
use App\Http\Resources\Cities\CityResource;
use App\Repositories\Contracts\GovernorateRepositoryInterface;

class GovernorateCitiesController extends Controller
{
    /**
     * GovernorateCitiesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Governorate $governorate)
    {
        return CityResource::collection($governorate->cities);
    }
}
