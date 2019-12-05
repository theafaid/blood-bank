<?php

namespace App\Providers;

use App\Repositories\Contracts\BloodTypeRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Repositories\Contracts\DonationRequestRepositoryInterface;
use App\Repositories\Contracts\GovernorateRepositoryInterface;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Repositories\Contracts\SiteSettingRepositoryInterface;
use App\Repositories\Eloquent\BloodTypeRepository;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\ClientRepository;
use App\Repositories\Eloquent\DonationRequestRepository;
use App\Repositories\Eloquent\GovernorateRepository;
use App\Repositories\Eloquent\PostRepository;
use App\Repositories\Eloquent\SiteSettingRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->bind(GovernorateRepositoryInterface::class, GovernorateRepository::class);
        $this->app->bind(BloodTypeRepositoryInterface::class, BloodTypeRepository::class);
        $this->app->bind(SiteSettingRepositoryInterface::class, SiteSettingRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(DonationRequestRepositoryInterface::class, DonationRequestRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('settings', function () {
            return resolve(SiteSettingRepositoryInterface::class)->fetch();
        });
    }
}
