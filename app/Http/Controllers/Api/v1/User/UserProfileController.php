<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Clients\ClientPrivateResource;
use App\Services\Api\v1\User\UserProfileUpdateService;
use App\Http\Requests\Api\v1\User\UserProfileUpdateRequest;

class UserProfileController extends Controller
{
    /**
     * UserProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @return ClientPrivateResource
     */
    public function show()
    {
        return new ClientPrivateResource(auth()->user());
    }

    /**
     * @param UserProfileUpdateRequest $request
     * @return mixed
     */
    public function update(UserProfileUpdateRequest $request)
    {
        return resolve(UserProfileUpdateService::class)
            ->handle($request->validated());
    }
}
