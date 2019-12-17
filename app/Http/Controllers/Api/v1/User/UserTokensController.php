<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\User\UserTokenStoreRequest;
use App\Http\Resources\Notifications\NotificationResource;

class UserTokensController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function store(UserTokenStoreRequest $request)
    {
        $request->user()->tokens()->create($request->validated());
    }
}
