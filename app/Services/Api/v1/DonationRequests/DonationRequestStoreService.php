<?php

namespace App\Services\Api\v1\DonationRequests;

use App\Repositories\Contracts\DonationRequestRepositoryInterface;

class DonationRequestStoreService
{
    /**
     * @var DonationRequestRepositoryInterface
     */
    protected $donationRequests;

    /**
     * DonationRequestStoreService constructor.
     * @param DonationRequestRepositoryInterface $donationRequests
     */
    public function __construct(DonationRequestRepositoryInterface $donationRequests)
    {
        $this->donationRequests = $donationRequests;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function handle($request)
    {
        $request = $this->handleRequestWithLocation($request);

        $donationRequest = $this->donationRequests->store($request);

        // notify clients who following $donationRequest->bloodType && $donationRequest->governorate

        return $donationRequest;
    }

    /**
     * @param $request
     * @return mixed
     */
    protected function handleRequestWithLocation($request)
    {
        preg_match('/(.+),(.+)/', $request['location'], $matches);

        unset($request['location']);
        $request['lat'] = $matches[1];
        $request['lng'] = $matches[2];

        return $request;
    }
}
