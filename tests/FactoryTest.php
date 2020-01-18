<?php

namespace Vipertecpro\UrlShortener\Test;

use Vipertecpro\UrlShortener\Drivers\Bitly;
use Vipertecpro\UrlShortener\Drivers\Google;

class FactoryTest extends TestCase
{
    /**
     *  @test
     */
    public function it_creates_google_driver(): void
    {
        $factory = $this->app['urlshortener.factory'];
        $driver  = $factory->make('google');
        $this->assertInstanceOf(Google::class, $driver);
    }

    /**
     *  @test
     */
    public function it_creates_bitly_driver(): void
    {
        $factory = $this->app['urlshortener.factory'];
        $driver  = $factory->make('bitly');
        $this->assertInstanceOf(Bitly::class, $driver);
    }

    /**
     *  @test
     */
    public function it_throws_exception_on_invalid_name(): void
    {
        $this->expectException('InvalidArgumentException');
        $factory = $this->app['urlshortener.factory'];
        $driver  = $factory->make('random');
    }
}
