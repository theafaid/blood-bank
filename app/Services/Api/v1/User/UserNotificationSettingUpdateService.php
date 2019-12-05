<?php

namespace App\Services\Api\v1\User;

use App\Services\Api\v1\ApiResponse;

class UserNotificationSettingUpdateService extends ApiResponse
{
    /**
     * @param $request
     * @param null $client
     * @return array
     */
    public function handle($request, $client = null)
    {
        $client = $client ?: auth()->user();

        $client->allowedBloodTypesForNotification()->sync($request['blood_types']);
        $client->allowedGovernoratesForNotification()->sync($request['governorates']);

        return (new UserNotificationSettingIndexService)->handle($client);
    }
}
