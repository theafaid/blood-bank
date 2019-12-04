<?php

namespace App\Services\Api\v1\Auth;

use App\Services\Api\v1\ApiResponse;
use App\Http\Resources\Clients\ClientPrivateResource;
use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientRegistrationService extends ApiResponse
{
    /**
     * @var ClientRepositoryInterface
     */
    protected $clients;

    /**
     * ClientRegistrationService constructor.
     * @param ClientRepositoryInterface $clients
     */
    public function __construct(ClientRepositoryInterface $clients)
    {
        $this->clients = $clients;
    }

    /**
     * @param $request
     * @return ClientPrivateResource
     */
    public function handle($request)
    {
        $client = $this->clients->store($request);

        $token = auth()->guard('api')->login($client);

        return $this->handleClientWithToken($token);
    }

    /**
     * @param $token
     * @return ClientPrivateResource
     */
    protected function handleClientWithToken($token)
    {
        return (new ClientPrivateResource(auth()->user()))->additional([
            'meta' => [
                'token' => $token,
            ]
        ]);
    }
}
