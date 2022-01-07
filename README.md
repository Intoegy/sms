# sms
send sms from your application

[![Build Status][ico-actions]][link-actions]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

Implements https://github.com/intoegy/sms for Laravel

## About

The `intoegy/sms` package allows you to send [SMS](https://themastergate.com/app/session/register?source=gomaa)
from your laravel application.


## Installation

Require the `intoegy/sms` package in your `composer.json` and update your dependencies:
```sh
composer require intoegy/sms
```

If you get a conflict, this could be because an older version of intoegy/sms or intoegy/sms is installed. Remove the conflicting package first, then try install again:

```sh
composer remove intoegy/sms 
composer require intoegy/sms
```
## Configuration

The defaults are set in `config/sms.php`. Publish the config to copy the file to your own config:
```sh
php artisan vendor:publish --tag="sms-config"
```

You have to add the package provider to your app providers list:
```php
'providers' => [
   // ...
   Intoegy\SMS\SMSServcieProvider::class,
   // ...
]
```

## Global usage
```php
    SMS::send('201010000000','test message');
```

To you can send sms from any place in you project, add the `SMS` alies in application aliess at `config/app.php`:

```php
'aliases' => [

    "SMS"=>Intoegy\SMS\SMSServiceProvider::class,
    // ...
];
```


## License

Released under the MIT License, see [LICENSE](LICENSE).

[ico-version]: https://img.shields.io/packagist/v/intoegy/sms.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-actions]: https://github.com/ntoegy/sms/workflows/.github/workflows/run-tests.yml/badge.svg
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/intoegy/sms.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/intoegy/sms.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/intoegy/sms.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/intoegy/sms
[link-actions]: https://github.com/intoegy/sms/actions
[link-scrutinizer]: https://scrutinizer-ci.com/g/intoegy/sms/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/intoegy/sms
[link-downloads]: https://packagist.org/packages/intoegy/sms
[link-author]: https://github.com/intoegy
[link-contributors]: ../../contributors
