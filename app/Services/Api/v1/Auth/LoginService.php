<?php

namespace App\Services\Api\v1\Auth;

use App\Http\Resources\Clients\ClientPrivateResource;
use App\Services\Api\v1\ApiResponse;

class LoginService extends ApiResponse
{
    /**
     * @param array $request
     * @return ClientPrivateResource|\Illuminate\Http\JsonResponse
     */
    public function handle(array $request)
    {
        if (! $token = $this->clientExists($request)) {
            return $this->setStatusCode(401)->respond([
                'error' => [
                    'email' => __('auth.failed')
                ]
            ]);
        }

        return $this->handleClientWithToken($token);
    }


    /**
     * @param $request
     * @return mixed
     */
    protected function clientExists($request)
    {
        return auth()->guard('api')->attempt($request);
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
