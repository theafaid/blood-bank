<?php

namespace App\Http\Controllers\Api\v1\Cities;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cities\CityResource;
use App\Services\Api\v1\Cities\CityIndexService;

class CityController extends Controller
{
    /**
     * CityController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke()
    {
        return CityResource::collection(
            resolve(CityIndexService::class)->handle()
        );
    }
}
