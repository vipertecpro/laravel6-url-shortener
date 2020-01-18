<?php

namespace Vipertecpro\UrlShortener\Drivers;

use Illuminate\Config\Repository as Config;
use InvalidArgumentException;

class Factory
{
    /**
     *  Google driver
     *
     *  @var Google
     */
    protected $google;

    /**
     *  Bitly driver
     *
     *  @var bitly
     */
    protected $bitly;

    /**
     *  Create a new Factory instance
     *
     *  @param  Config $config
     *  @return void
     */
    public function __construct(Config $config)
    {
        $googleApiKey   = $config->get('urlshortener.google.apikey');
        $bitlyUsername  = $config->get('urlshortener.bitly.username');
        $bitlyPassword  = $config->get('urlshortener.bitly.password');
        $connectTimeout = $config->get('urlshortener.connect_timeout');
        $timeout        = $config->get('urlshortener.timeout');

        $this->google = new Google($googleApiKey, $connectTimeout, $timeout);
        $this->bitly  = new Bitly($bitlyUsername, $bitlyPassword, $connectTimeout, $timeout);
    }

    /**
     *  Create a new Url Shortener driver instance based on its name
     *
     * @param string $driverName google|bitly
     * @return bitly|Google
     */
    public function make($driverName)
    {
        $driverName = strtolower(trim($driverName));
        switch ($driverName) {
            case 'google':
                return $this->google;
            case 'bitly':
                return $this->bitly;
            default:
                throw new InvalidArgumentException('Invalid URL Shortener driver name');
        }
    }
}
