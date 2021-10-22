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
                'merchantId'=>'zqpj47n48m74msk6',
                'publicKey'=>'nwtc35wbm7h57pdq',
                'privateKey'=>'94d3fc1dd37db40414bb71f36aa3ce55'
                ]
                );
        });
    }
}
