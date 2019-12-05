<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use App\Services\Api\v1\User\UserNotificationSettingIndexService;
use App\Services\Api\v1\User\UserNotificationSettingUpdateService;
use App\Http\Requests\Api\v1\User\UserNotificationSettingUpdateRequest;

class UserNotificationsSettingController extends Controller
{
    /**
     * UserNotificationsSettingController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return resolve(UserNotificationSettingIndexService::class)->handle();
    }

    /**
     * @param UserNotificationSettingUpdateRequest $request
     * @return mixed
     */
    public function update(UserNotificationSettingUpdateRequest $request)
    {
        return resolve(UserNotificationSettingUpdateService::class)
            ->handle($request->validated());
    }
}
