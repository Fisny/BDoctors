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
                'merchantId'=>'zvnjkg958m5q2sy3',
                'publicKey'=>'hnx3sbk59wqtp66b',
                'privateKey'=>'28d2466b785c89074e67e1232d2aa20c'
                ]
                );
        });
    }
}
