<?php

namespace App\Providers;

use App\Repositories\Contracts\BloodTypeRepositoryInterface;
use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Repositories\Contracts\GovernorateRepositoryInterface;
use App\Repositories\Eloquent\BloodTypeRepository;
use App\Repositories\Eloquent\ClientRepository;
use App\Repositories\Eloquent\GovernorateRepository;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
