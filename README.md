# Laravel-Modules

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jarhen/codifire-modules.svg?style=flat-square)](https://packagist.org/packages/jarhen/codifire-modules)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/nWidart/codifire-modules/1.0.svg?style=flat-square)](https://travis-ci.org/nWidart/codifire-modules)
[![Scrutinizer Coverage](https://img.shields.io/scrutinizer/coverage/g/nWidart/codifire-modules.svg?maxAge=86400&style=flat-square)](https://scrutinizer-ci.com/g/nWidart/codifire-modules/?branch=master)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/25320a08-8af4-475e-a23e-3321f55bf8d2.svg?style=flat-square)](https://insight.sensiolabs.com/projects/25320a08-8af4-475e-a23e-3321f55bf8d2)
[![Quality Score](https://img.shields.io/scrutinizer/g/nWidart/codifire-modules.svg?style=flat-square)](https://scrutinizer-ci.com/g/nWidart/codifire-modules)
[![Total Downloads](https://img.shields.io/packagist/dt/jarhen/codifire-modules.svg?style=flat-square)](https://packagist.org/packages/jarhen/codifire-modules)

| **Laravel**  |  **codifire-modules** |
|---|---|
| 5.4  | ^1.0  |
| 5.5  | ^2.0  |

`jarhen/codifire-modules` is a Laravel package which created to manage your large Laravel app using modules. Module is like a Laravel package, it has some views, controllers or models. This package is supported and tested in Laravel 5.

This package is a re-published, re-organised and maintained version of [pingpong/modules](https://github.com/pingpong-labs/modules), which isn't maintained anymore. This package is used in [AsgardCMS](https://asgardcms.com/).

With one big added bonus that the original package didn't have: **tests**.

Find out why you should use this package in the article: [Writing modular applications with codifire-modules](https://nicolaswidart.com/blog/writing-modular-applications-with-codifire-modules).

## Install

To install through Composer, by run the following command:

``` bash
composer require jarhen/codifire-modules
```

### Add Service Provider

Next add the following service provider in `config/app.php`.

``` php
'providers' => [
  Jarhen\Modules\LaravelModulesServiceProvider::class,
],
```

Next, add the following aliases to `aliases` array in the same file:

``` php
'aliases' => [
  'Module' => Jarhen\Modules\Facades\Module::class,
],
```

Next publish the package's configuration file by running:

``` bash
php artisan vendor:publish --provider="Jarhen\Modules\LaravelModulesServiceProvider"
```

### Autoloading

By default the module classes are not loaded automatically. You can autoload your modules using `psr-4`. For example:

``` json
{
  "autoload": {
    "psr-4": {
      "App\\": "app/",
      "Modules\\": "Modules/"
    }
  }
}
```

**Tip: don't forget to run `composer dump-autoload` afterwards**

## Documentation

You'll find installation instructions and full documentation on [https://jarhen.com/codifire-modules/](https://jarhen.com/codifire-modules/).

## Credits

- [Nicolas Widart](https://github.com/jarhen)
- [gravitano](https://github.com/gravitano)
- [All Contributors](../../contributors)

## About Nicolas Widart

Nicolas Widart is a freelance web developer specialising on the Laravel framework. View all my packages [on my website](https://nicolaswidart.com/projects).


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
