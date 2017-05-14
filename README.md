# Monolog with Sentry for Laravel 5.4

[![Software License][ico-license]](LICENSE.md)

Laravel 5.4 library for integration Monolog errors with Sentry [sentry-laravel](https://github.com/getsentry/sentry-laravel).

This library implies already installed [sentry-laravel](https://github.com/getsentry/sentry-laravel).


## Install

Go to the root of your Laravel 5.4 project and run the following command:

``` bash
composer require timetorock/laravel-monolog-sentry
```

Then in your `config/app.php` add the `MonologSentryServiceProvider` to your `providers` array

```php
'providers' => array(

    ...
    Timetorock\LaravelMonologSentry\Providers\MonologSentryServiceProvider::class,
),
```

Your `config/sentry.php` file must have DSN from your Sentry project.

```php
'dsn'     => 'https://***:***@sentry.yourdomain.com/{project}'
```

## Configuration

You can configure Raven through the `config/sentry.php` config file. All the available options are already in there together with their default values.

You can find more details about the available options in Raven using this link:

[https://github.com/getsentry/raven-php#configuration](https://github.com/getsentry/raven-php#configuration)

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