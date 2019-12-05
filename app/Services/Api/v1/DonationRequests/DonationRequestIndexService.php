<?php

namespace App\Services\Api\v1\DonationRequests;

use App\Scoping\Scopes\CityScope;
use App\Scoping\Scopes\BloodTypeScope;
use App\Repositories\Contracts\DonationRequestRepositoryInterface;

class DonationRequestIndexService
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
        return $this->donationRequests->withScopes($this->scopes())->paginate();
    }

    /**
     * @return array
     */
    protected function scopes()
    {
        return [
            'blood-type' => new BloodTypeScope,
            'city' => new CityScope,
        ];
    }
}
