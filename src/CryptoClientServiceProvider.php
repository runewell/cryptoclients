<?php

namespace Runewell\CryptoClients;

use Illuminate\Support\ServiceProvider;

class CryptoClientsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return [type] [description]
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['crypt'] = $this->app->share(function ($app){
            return new CryptoClients;
        })
    }

}
