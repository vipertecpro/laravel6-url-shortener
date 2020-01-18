# Laravel 6 url shortener

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vipertecpro/url-shortener.svg?style=flat-square)](https://packagist.org/packages/vipertecpro/url-shortener)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/vipertecpro/url-shortener/master.svg?style=flat-square)](https://travis-ci.org/vipertecpro/url-shortener)
[![Total Downloads](https://img.shields.io/packagist/dt/vipertecpro/url-shortener.svg?style=flat-square)](https://packagist.org/packages/vipertecpro/url-shortener)

## Introduction

URL shortener package that gives a convenient Laravel Facade for [mremi/UrlShortener](https://github.com/mremi/UrlShortener)

Vipertecpro is a web development studio based in Madrid, Spain. You can learn more about us at [Vipertecpro.com](http://Vipertecpro.com)

## Installation and Setup

Require through composer

    composer require Vipertecpro/url-shortener 1.0.x

In config/app.php, add the following entry to the end of the providers array:

    Vipertecpro\UrlShortener\UrlShortenerServiceProvider::class,

And the following alias:

    'UrlShortener' => Vipertecpro\UrlShortener\Facades\UrlShortener::class,

Publish the configuration file, the form view and the language entries:

    php artisan vendor:publish --provider="Vipertecpro\UrlShortener\UrlShortenerServiceProvider"

Check the config files for the environment variables you need to set for the selected driver.

## Usage

### Shorten a url

    ```php
    \UrlShortener::shorten('http://google.com'); // Uses default driver as per config settings
    \UrlShortener::driver('bitly')->shorten('http://google.com');
    ```

### Expand a url

    ```php
    \UrlShortener::expand('http://google.com'); // Uses default driver as per config settings
    \UrlShortener::driver('bitly')->expand('http://google.com');
    ```
