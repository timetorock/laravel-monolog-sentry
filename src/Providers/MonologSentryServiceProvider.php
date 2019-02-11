<?php

namespace Timetorock\LaravelMonologSentry\Providers;

use Log;
use Monolog\Logger;
use Illuminate\Support\ServiceProvider;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RavenHandler;
use Raven_Client;

class MonologSentryServiceProvider extends ServiceProvider
{

    const SENTRY = 'sentry';
    const SENTRY_LEVEL = 'sentry.level';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootstrap();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Nothing to register
    }

    /**
     * Bootstraps RavenHandler and Monolog together
     */
    private function bootstrap()
    {
        if (app()->bound(self::SENTRY)) {
            $handler = new RavenHandler(app(self::SENTRY), config(self::SENTRY_LEVEL, Logger::WARNING));
            $handler->setFormatter(new LineFormatter("%message% %context%\n"));

            /**
             * @var $monolog Logger
             */
            $monolog = Log::driver();
            $monolog->pushHandler($handler);
        }
    }
}