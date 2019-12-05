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
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->donationRequests->{$name}($arguments[0]);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
   {
       return $this->donationRequests->create($data);
   }

    /**
     * @param int $limit
     * @return mixed
     */
    public function paginated($limit = 15)
   {
        return $this->donationRequests->latest()->paginate($limit);
   }
}
