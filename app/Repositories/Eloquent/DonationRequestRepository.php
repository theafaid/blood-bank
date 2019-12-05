<?php

namespace App\Repositories\Eloquent;

use App\Models\DonationRequest;
use App\Repositories\Contracts\DonationRequestRepositoryInterface;

class DonationRequestRepository implements DonationRequestRepositoryInterface
{
    /**
     * @var DonationRequest
     */
    protected $donationRequests;

    /**
     * CategoryRepository constructor.
     * @param DonationRequest $donationRequests
     */
    public function __construct(DonationRequest $donationRequests)
    {
        $this->donationRequests = $donationRequests;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
   {
       return $this->donationRequests->create($data);
   }
}
