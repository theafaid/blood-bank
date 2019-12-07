<?php

namespace App\Services\Api\v1\Cities;

use App\Models\City;
use App\Scoping\Scopes\GovernorateScope;

class CityIndexService
{
    /**
     * @return mixed
     */
    public function handle()
    {
        return City::withScopes($this->scopes())->get();
    }

    /**
     * @return array
     */
    protected function scopes()
    {
        return [
            'governorate' => new GovernorateScope,
        ];
    }
}
