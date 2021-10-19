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
                'merchantId'=>'b9xnd5zf5t63b5j7',
                'publicKey'=>'tnz3ctmtp9p6hbws',
                'privateKey'=>'525956ebbdca4ecfe0917771753e7cc8'
                ]
                );
        });
    }
}
