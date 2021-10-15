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
                'merchantId'=>'477xz79nm7gw95b2',
                'publicKey'=>'j7wry4yzzhzwfnzj',
                'privateKey'=>'b5f94a8ba7a13692a2525cb0d09ab7fa'
                ]
                );
        });
    }
}
