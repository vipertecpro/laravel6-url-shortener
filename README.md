# Laravel 6 url shortener

[![Latest Stable Version](https://poser.pugx.org/vipertecpro/laravel6-url-shortener/v/stable)](https://packagist.org/packages/vipertecpro/laravel6-url-shortener)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://scrutinizer-ci.com/g/vipertecpro/laravel6-url-shortener/badges/build.png?b=master)](https://scrutinizer-ci.com/g/vipertecpro/laravel6-url-shortener/build-status/master)
[![Total Downloads](https://poser.pugx.org/vipertecpro/laravel6-url-shortener/downloads)](https://packagist.org/packages/vipertecpro/laravel6-url-shortener)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vipertecpro/laravel6-url-shortener/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/vipertecpro/laravel6-url-shortener/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/vipertecpro/laravel6-url-shortener/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![License](https://poser.pugx.org/vipertecpro/laravel6-url-shortener/license)](https://packagist.org/packages/vipertecpro/laravel6-url-shortener)

## Introduction

URL shortener package that gives a convenient Laravel Facade for [mremi/UrlShortener](https://github.com/mremi/UrlShortener)

Vipertecpro is a web development studio based in Madrid, Spain. You can learn more about us at [Vipertecpro.com](http://Vipertecpro.com)

## Installation and Setup

Require through composer

    composer require vipertecpro/laravel6-url-shortener

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
