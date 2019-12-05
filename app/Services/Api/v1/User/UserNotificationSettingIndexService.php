<?php

namespace App\Services\Api\v1\User;

use App\Http\Resources\BloodTypes\BloodTypeResource;
use App\Http\Resources\Governorates\GovernorateResource;
use App\Services\Api\v1\ApiResponse;

class UserNotificationSettingIndexService extends ApiResponse
{
    /**
     * @return array
     */
    public function handle($client = null)
    {
        $client = $client ?: auth()->user();

        return [
            'bloodTypes' => BloodTypeResource::collection($client->allowedBloodTypesForNotification),
            'governorates' => GovernorateResource::collection($client->allowedGovernoratesForNotification),
        ];

    }
}
