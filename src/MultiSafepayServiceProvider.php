<?php

namespace Whitecube\MultiSafepay;

use Illuminate\Support\ServiceProvider;

class MultiSafepayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/multisafepay.php' => config_path('multisafepay.php')
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function($app) {
            return new Client(config('multisafepay.env'), config('multisafepay.api_key'));
        });
    }
}
