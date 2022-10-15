<?php

namespace App\Providers;

use App\Repository\CampaignRepositoryInterface;
use App\Repository\Eloquent\CampaignRepository;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CampaignRepositoryInterface::class, CampaignRepository::class);
    }
}
