<?php

namespace App\Http\Controllers\Api\v1\DonationRequests;

use App\Models\DonationRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\DonationRequests\DonationRequestResource;
use App\Services\Api\v1\DonationRequests\DonationRequestStoreService;
use App\Services\Api\v1\DonationRequests\DonationRequestIndexService;
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
     * @return mixed
     */
    public function index()
    {
        return resolve(DonationRequestIndexService::class)
            ->handle(request());
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

    /**
     * @param DonationRequest $donationRequest
     * @return DonationRequestResource
     */
    public function show(DonationRequest $donationRequest)
    {
        return new DonationRequestResource($donationRequest);
    }
}
