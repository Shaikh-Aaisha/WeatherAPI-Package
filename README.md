# Laravel Weather API Package

[![Latest Stable Version](http://poser.pugx.org/phpunit/phpunit/v)](https://packagist.org/packages/phpunit/phpunit) [![Total Downloads](http://poser.pugx.org/phpunit/phpunit/downloads)](https://packagist.org/packages/phpunit/phpunit) [![Latest Unstable Version](http://poser.pugx.org/phpunit/phpunit/v/unstable)](https://packagist.org/packages/phpunit/phpunit) [![License](http://poser.pugx.org/phpunit/phpunit/license)](https://packagist.org/packages/phpunit/phpunit) [![PHP Version Require](http://poser.pugx.org/phpunit/phpunit/require/php)](https://packagist.org/packages/phpunit/phpunit)

## Installation
Require this package, with [Composer](https://packagist.org/), in the root directory of your project.

```bash
$ composer require weather/weatherbit
```

Add the service provider to `config/app.php` in the `providers` array.

```php
Flight\Aerodatabox\Providers\AeroDataBoxServiceProvider::class,
```

## Configuration

Laravel requires connection configuration. To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish --provider="Flight\Aerodatabox\Providers\AeroDataBoxServiceProvider"
```

You are free to change the configuration file as needed, but the default expected values are below in .env file:

```php
RAPID_API_KEY="your rapid api key"
RAPID_API_HOST="api host" 
```

#### Run APIs on Postman

import postman collection via link and run APIs 
```
https://api.postman.com/collections/22576705-2c3f6c12-c357-454c-bddd-d2796ab0bfab?access_key=PMAT-01GWH1741MPHHS3AZP2H4R4RXK
```

