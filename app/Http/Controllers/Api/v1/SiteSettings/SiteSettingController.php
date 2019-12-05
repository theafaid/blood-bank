<?php

namespace App\Http\Controllers\Api\v1\SiteSettings;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiteSettings\SiteSettingResource;
use App\Repositories\Contracts\SiteSettingRepositoryInterface;

class SiteSettingController extends Controller
{
    /**
     * @var SiteSettingRepositoryInterface
     */
    protected $settings;

    /**
     * SiteSettingController constructor.
     * @param SiteSettingRepositoryInterface $settings
     */
    public function __construct(SiteSettingRepositoryInterface $settings)
    {
        $this->middleware('auth:api');

        $this->settings = $settings;
    }

    /**
     * @return SiteSettingResource
     */
    public function __invoke()
    {
        return new SiteSettingResource($this->settings->fetch());
    }
}
