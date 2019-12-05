<?php

namespace App\Http\Controllers\Api\v1\DonationRequests;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\DonationRequests\DonationRequestStoreRequest;

class DonationRequestController extends Controller
{
    public function store(DonationRequestStoreRequest $request)
    {
        dd($request);
    }
}
