<?php

namespace Vipertecpro\UrlShortener\Test;

use GuzzleHttp\Exception\BadResponseException;
use Mockery;
use Mremi\UrlShortener\Exception\InvalidApiResponseException;
use Psr\Http\Message\RequestInterface;
use Vipertecpro\UrlShortener\Drivers\BaseDriver;
use Vipertecpro\UrlShortener\Drivers\Factory;
use Vipertecpro\UrlShortener\Exceptions\InvalidResponseException;
use Vipertecpro\UrlShortener\UrlShortener;

class UrlShortenerTest extends TestCase
{
    /**
     *  @test
     */
    public function it_calls_the_driver_to_shorten(): void
    {
        $factory   = Mockery::mock(Factory::class);
        $driver    = Mockery::mock(BaseDriver::class);
        $shortener = new UrlShortener($factory);

        $factory->shouldReceive('make')->with('driverName')->andReturn($driver);
        $shortener->setDriver('driverName');

        $driver->shouldReceive('shorten')->with('http://google.com')->andReturn('short');
        $url = $shortener->shorten('http://google.com');
        $this->assertEquals('short', $url);
    }

    /**
     *  @test
     */
    public function it_calls_the_driver_to_expand(): void
    {
        $factory   = Mockery::mock(Factory::class);
        $driver    = Mockery::mock(BaseDriver::class);
        $shortener = new UrlShortener($factory);

        $factory->shouldReceive('make')->with('driverName')->andReturn($driver);
        $shortener->setDriver('driverName');

        $driver->shouldReceive('expand')->with('http://google.com')->andReturn('short');
        $url = $shortener->expand('http://google.com');
        $this->assertEquals('short', $url);
    }

    /**
     *  @test
     */
    public function it_returns_new_instance_on_driver_hot_swap(): void
    {
        $this->assertInstanceOf(UrlShortener::class, UrlShortener::driver('google'));
    }

    /**
     *  @test
     *  @expectedException InvalidResponseException
     */
    public function it_throws_invalid_response_exception_on_bad_response(): void
    {
        $factory   = Mockery::mock(Factory::class);
        $driver    = Mockery::mock(BaseDriver::class);
        $shortener = new UrlShortener($factory);

        $factory->shouldReceive('make')->with('driverName')->andReturn($driver);
        $shortener->setDriver('driverName');
        $driver->shouldReceive('expand')->with('http://google.com')->andThrow(new BadResponseException('e', Mockery::mock(RequestInterface::class)));
        $shortener->expand('http://google.com');
    }

    /**
     *  @test
     *  @expectedException InvalidResponseException
     */
    public function it_throws_invalid_response_exception_on_invalid_api_response(): void
    {
        $factory   = Mockery::mock(Factory::class);
        $driver    = Mockery::mock(BaseDriver::class);
        $shortener = new UrlShortener($factory);

        $factory->shouldReceive('make')->with('driverName')->andReturn($driver);
        $shortener->setDriver('driverName');
        $driver->shouldReceive('expand')->with('http://google.com')->andThrow(new InvalidApiResponseException);
        $shortener->expand('http://google.com');
    }
}
