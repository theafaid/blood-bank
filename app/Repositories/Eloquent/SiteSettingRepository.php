<?php

namespace App\Repositories\Eloquent;

use App\Models\SiteSettings;
use App\Repositories\Contracts\SiteSettingRepositoryInterface;

class SiteSettingRepository implements SiteSettingRepositoryInterface
{

    protected $siteSettings;

    /**
     * SiteSettingsRepository constructor.
     * @param SiteSettings $siteSettings
     */
    public function __construct(SiteSettings $siteSettings)
    {
        $this->siteSettings = $siteSettings;
    }

    /**
     * @return mixed
     */
    public function fetch()
    {
        return $this->siteSettings->first();
    }
}
