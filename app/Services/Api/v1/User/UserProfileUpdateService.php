<?php

namespace App\Services\Api\v1\User;

use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Services\Api\v1\ApiResponse;

class UserProfileUpdateService extends ApiResponse
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle($request, $client = null)
    {
        $client = $client ?: auth()->user();

        $this->clients->update($client, $request);

        return $this->respond('تم تعديل بياناتك بنجاح');
    }
}
