<?php

namespace App\Services\Api\v1\User;

use App\Http\Resources\Clients\ClientPrivateResource;
use App\Repositories\Contracts\ClientRepositoryInterface;

class UserProfileUpdateService
{
    /**
     * @var ClientRepositoryInterface
     */
    protected $clients;

    /**
     * UserProfileUpdateService constructor.
     * @param ClientRepositoryInterface $clients
     */
    public function __construct(ClientRepositoryInterface $clients)
    {
        $this->clients = $clients;
    }

    /**
     * @param $request
     * @param null $client
     * @return ClientPrivateResource
     */
    public function handle($request, $client = null)
    {
        $client = $client ?: auth()->user();

        $this->clients->update($client, $request);

        return (new ClientPrivateResource($client->fresh()))->additional([
            'message' => 'تم تعديل بياناتك بنجاح',
        ]);
    }
}
