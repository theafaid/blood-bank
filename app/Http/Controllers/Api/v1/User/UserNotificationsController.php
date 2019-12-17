<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Notifications\NotificationResource;

class UserNotificationsController extends Controller
{
    /**
     * UserNotificationsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {

        return NotificationResource::collection(
            auth()->user()->notifications()->latest()->get()
        );
    }
}
