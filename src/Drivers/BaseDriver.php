<?php

namespace Vipertecpro\UrlShortener\Drivers;

use GuzzleHttp\Exception\BadResponseException;
use Mremi\UrlShortener\Exception\InvalidApiResponseException;
use Mremi\UrlShortener\Model\Link;

abstract class BaseDriver
{
    /**
     *  Url Shortener Provider
     */
    protected $provider;

    /**
     *  Shorten the given url
     *
     *  @param  string $url
     *  @throws BadResponseException
     *  @throws InvalidApiResponseException
     *  @return string
     */
    public function shorten($url): string
    {
        $link = new Link;
        $link->setLongUrl($url);
        $this->provider->shorten($link);
        return $link->getShortUrl();
    }

    /**
     *  Expand the given url
     *
     *  @param  string $url
     *  @throws BadResponseException
     *  @throws InvalidApiResponseException
     *  @return string
     */
    public function expand($url): string
    {
        $link = new Link;
        $link->setShortUrl($url);
        $this->provider->expand($link);
        return $link->getLongUrl();
    }
}
