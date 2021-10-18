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
                'merchantId'=>'585rh353b9hhbm6m',
                'publicKey'=>'nz5wfxvny7vpqc66',
                'privateKey'=>'7b2eec3dd7912e698e8d372f4e755e2c'
                ]
                );
        });
    }
}
