<?php

namespace App\Services\Api\v1\Auth;

use App\Services\Api\v1\ApiResponse;

class LoginService extends ApiResponse
{
    /**
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(array $request)
    {
        if (! $token = $this->clientExists($request)) {
            return $this->setStatusCode(401)->respond([
                'error' => __('auth.failed')
            ]);
        }

        return $this->respondWithToken($token);
    }


    /**
     * @param $request
     * @return mixed
     */
    protected function clientExists($request)
    {
        return auth()->guard('api')->attempt($request);
    }
}
