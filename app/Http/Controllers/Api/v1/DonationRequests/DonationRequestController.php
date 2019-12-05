<?php

namespace App\Http\Controllers\Api\v1\DonationRequests;

use App\Http\Controllers\Controller;
use App\Http\Resources\DonationRequests\DonationRequestResource;
use App\Services\Api\v1\DonationRequests\DonationRequestStoreService;
use App\Http\Requests\Api\v1\DonationRequests\DonationRequestStoreRequest;

class DonationRequestController extends Controller
{
    /**
     * DonationRequestController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @param DonationRequestStoreRequest $request
     * @return DonationRequestResource
     */
    public function store(DonationRequestStoreRequest $request)
    {
        return new DonationRequestResource(
            resolve(DonationRequestStoreService::class)
                ->handle($request->validated())
        );
    }
}
