<?php

namespace Vipertecpro\UrlShortener\App\Providers;

use Illuminate\Support\ServiceProvider;
use Vipertecpro\UrlShortener\Drivers\Factory;
use Vipertecpro\UrlShortener\UrlShortener;

class UrlShortenerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        $root = '/../..';
        $this->publishes([
            __DIR__.$root . '/config/urlshortener.php' => config_path('urlshortener.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__.$root . '/config/urlshortener.php', 'urlshortener'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register():void
    {
        $this->app->singleton('urlshortener.factory', Factory::class);
        $this->app->singleton('urlshortener', function ($app) {
            $shortener = new UrlShortener($app['urlshortener.factory']);
            $shortener->setDriver($app['config']->get('urlshortener.driver'));
            return $shortener;
        });
    }
}
