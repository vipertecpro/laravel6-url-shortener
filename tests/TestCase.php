<?php

namespace Vipertecpro\UrlShortener\Test;

use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as Orchestra;
use Vipertecpro\UrlShortener\Facades\UrlShortener;
use Vipertecpro\UrlShortener\App\Providers\UrlShortenerServiceProvider;

abstract class TestCase extends Orchestra
{
    /**
     * @param Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            UrlShortenerServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'UrlShortener' => UrlShortener::class,
        ];
    }

    /**
     * @param Application $app
     */
    protected function getEnvironmentSetUp($app):void
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
        $app['config']->set('app.key', 'sF5r4kJy5HEcOEx3NWxUcYj1zLZLHxuu');
    }
}
