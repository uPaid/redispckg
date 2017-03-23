<?php

namespace Redispckg\Providers;

use Illuminate\Redis\RedisManager;
use Illuminate\Support\ServiceProvider;

class RedisDataProvider extends ServiceProvider {
    
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/../config/database.php', 'redispckg');
        $this->app->singleton('redis', function ($app) {
            return new RedisManager('predis', $app['config']['database.redis']);
        });
    }
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(){
        require_once(__DIR__.'/../config/database.php');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['redis'];
    }
}
