<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Services\Api\v1\Auth\ClientRegistrationService;
use App\Http\Requests\Api\v1\Auth\UserRegistrationRequest;

class RegisterController extends Controller
{
    /**
     * @var ClientRegistrationService
     */
    protected $service;

    /**
     * RegisterController constructor.
     * @param ClientRegistrationService $service
     */
    public function __construct(ClientRegistrationService $service)
    {
        $this->middleware('guest:api');

        $this->service = $service;
    }

    /**
     * @param UserRegistrationRequest $request
     * @return \App\Http\Resources\Clients\ClientPrivateResource
     */
    public function __invoke(UserRegistrationRequest $request)
    {
        return $this->service->handle($request->validated());
    }
}
