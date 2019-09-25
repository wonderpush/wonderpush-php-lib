WonderPush PHP library
======================

[![Build Status](https://travis-ci.org/wonderpush/wonderpush-php-lib.svg?branch=master)](https://travis-ci.org/wonderpush/wonderpush-php-lib)
[![Latest Stable Version](https://poser.pugx.org/wonderpush/wonderpush-php-lib/version)](https://packagist.org/packages/wonderpush/wonderpush-php-lib)
[![License](https://poser.pugx.org/wonderpush/wonderpush-php-lib/license.svg)](https://packagist.org/packages/wonderpush/wonderpush-php-lib)
[![Coverage Status](https://coveralls.io/repos/github/wonderpush/wonderpush-php-lib/badge.svg?branch=master)](https://coveralls.io/github/wonderpush/wonderpush-php-lib?branch=master)

Find the full WonderPush services documentation at:
https://docs.wonderpush.com/docs.



## Introduction

This project contain a PHP library for interacting with the WonderPush services.
It helps you performing calls to the Management API. This contrasts with the SDKs, which are targeted at being integrated within your apps and handle interactions with the users.


### APIs

WonderPush comes as two APIs, one aimed at the user devices, and the other optional one aimed at your servers and tools.
The former is simply called the REST API, whereas the latter is called the Management API.

This tool helps you performing calls to the Management API.

#### Management API Reference

All references for the WonderPush Management API are available on the WonderPush documentation pages:
https://docs.wonderpush.com/reference.



## Documentation

Please see https://wonderpush.github.io/wonderpush-php-lib for up-to-date documentation.



## Requirements

PHP 5.3.3 and later.



## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require wonderpush/wonderpush-php-lib
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/00-intro.md#autoloading):

```php
require_once('vendor/autoload.php');
```



## Manual Installation

If you do not wish to use Composer, you can download the [latest release](https://github.com/wonderpush/wonderpush-php-lib/releases).
Then, to use the bindings, include the `init.php` file.

```php
require_once('/path/to/wonderpush-php-lib/init.php');
```



## Dependencies

The bindings require the following extension in order to work properly:

- [`curl`](https://secure.php.net/manual/en/book.curl.php)
- [`json`](https://secure.php.net/manual/en/book.json.php)

If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.



## Getting Started

Simple usage looks like:

```php
$wonderpush = new \WonderPush\WonderPush(WONDERPUSH_ACCESS_TOKEN, WONDERPUSH_APPLICATION_ID);
$response = $wonderpush->deliveries()->create(
    \WonderPush\Params\DeliveriesCreateParams::_new()
        ->setTargetSegmentIds('@ALL')
        ->setNotification(\WonderPush\Obj\Notification::_new()
            ->setAlert(\WonderPush\Obj\NotificationAlert::_new()
                ->setTitle('Using the PHP library')
                ->setText('Hello, WonderPush!')
            ))
);
echo $response->getNotificationId();
```


### Configuring a Logger

The library does minimal logging, but it can be configured with a [`PSR-3` compatible logger](http://www.php-fig.org/psr/psr-3/) so that messages end up there instead of `error_log`:

```php
$wonderpush->setLogger($logger);
```



## Development

Install dependencies:

``` bash
composer install
```



## Tests

Install dependencies as mentioned above (which will resolve [PHPUnit](http://packagist.org/packages/phpunit/phpunit)), then you can run the test suite:

```bash
./test
```

Or to run an individual test file:

```bash
vendor/bin/phpunit tests/SomeTest.php
```
