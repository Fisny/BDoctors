<?php

namespace App\Providers;

use Braintree\Gateway;

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
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
                [
                'environment'=>'sandbox',
                'merchantId'=>'dvm52gdqpdmqbjy9',
                'publicKey'=>'zthsvq2j5m2g5dpr',
                'privateKey'=>'53fd61848523b782da1a6f5f0031a0d9'
                ]
                );
        });
    }
}
