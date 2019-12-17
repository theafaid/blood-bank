<?php

namespace App\Services\Api\v1\DonationRequests;

use App\Models\Client;
use App\Notifications\DonationRequests\DonationRequestCreated;
use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Repositories\Contracts\DonationRequestRepositoryInterface;
use function foo\func;

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

        $this->notifyInterestedClients($donationRequest);

        return $donationRequest;
    }

    /**
     * @param $donationRequest
     */
    protected function notifyInterestedClients($donationRequest)
    {
        $clients = $this->interestedClients($donationRequest);

        $clients->map(function ($client) use ($donationRequest) {
            $client->notify(new DonationRequestCreated($donationRequest));
        });


        $this->notifyViaFCM($donationRequest, $clients);
    }

    /**
     * @param $donationRequest
     * @param $clients
     * @return bool|string
     */
    protected function notifyViaFCM($donationRequest, $clients)
    {
        $tokens = $clients->map(function ($client) {
            return $client->tokens->pluck('token');
        })->toArray()[0];


        $registrationIDs = $tokens;


        $fcmMsg = [
            'body' => $donationRequest->owner->name . " يريد تبرع بالقرب منك",
            'title' => 'يوجد طلب تبرع بالقرب منك',
            'sound' => "default",
            'color' => "#203E78"
        ];

        $fcmFields = [
            'registration_ids' => $registrationIDs,
            'priority' => 'high',
            'notification' => $fcmMsg,
            'data' => $fcmMsg,
        ];

        $headers = array(
            'Authorization: key='.env('FIREBASE_API_ACCESS_KEY'),
            'Content-Type: application/json'
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmFields));
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    /**
     * @param $donationRequest
     * @return mixed
     */
    protected function interestedClients($donationRequest)
    {
        $clientsIds = array_intersect(
            $donationRequest->governorate()->notifiedClients->pluck('id')->toArray(),
            $donationRequest->bloodType->notifiedClients->pluck('id')->toArray()
        );

        return Client::whereIn('id', $clientsIds)->get();
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
        $request['client_id'] = auth()->id();

        return $request;
    }
}
