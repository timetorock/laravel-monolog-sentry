# Monolog Sentry for Laravel 5.x

[![Software License][ico-license]](LICENSE.md)

Laravel 5.x library for integration Monolog errors with Sentry [sentry-laravel](https://github.com/getsentry/sentry-laravel).

This library implies already installed [sentry-laravel](https://github.com/getsentry/sentry-laravel).

## Installation

Go to the root of your Laravel project and run the following command:

Laravel 5.4 or earlier:

``` bash
composer require timetorock/laravel-monolog-sentry 1.3
```

Laravel 5.5+:

``` bash
composer require timetorock/laravel-monolog-sentry
```

## Laravel 5.4 or earlier

(Service will be auto-discovered by Laravel 5.5+)

Then in your `config/app.php` add the `MonologSentryServiceProvider` to your `providers` array

```php
'providers' => array(

    ...
    Timetorock\LaravelMonologSentry\Providers\MonologSentryServiceProvider::class,
),
```

## Configuration

Your `config/sentry.php` file must have DSN from your Sentry project.

```php
'dsn'     => 'https://***:***@sentry.yourdomain.com/{project}'
```

You can configure Raven through the `config/sentry.php` config file. All the available options are already in there together with their default values.

You can find more details about the available options in Raven using this link:

[https://github.com/getsentry/raven-php#configuration](https://github.com/getsentry/raven-php#configuration)

By default notification would be send for `warning` level and more.

You can change log level with `sentry.level` config option, must be a Monolog number.

`Monolog\Logger` levels:

```
    DEBUG = 100;
    INFO = 200;
    NOTICE = 250;
    WARNING = 300;
    ERROR = 400;
    CRITICAL = 500;
    ALERT = 550;
    EMERGENCY = 600;
```


## Testing

To test if your Sentry application is correctly grabbing your logs, simply launch `php artisan tinker` and execute a sample log like so:

``` bash
$ php artisan tinker
>>> Log::error("This is a test error. Sentry should get this.");
```

## Security

If you discover any security related issues, please email alejandronat@gmail.com or use the issue tracker.

## Credits

- [Aleksandr Natalenko](https://github.com/tiemtorock)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square