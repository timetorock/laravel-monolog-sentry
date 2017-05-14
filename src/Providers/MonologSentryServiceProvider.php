<?php

namespace Timetorock\LaravelMonologSentry\Providers;

use Illuminate\Support\ServiceProvider;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RavenHandler;
use Raven_Client;
use Log;

class MonologSentryServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootstrapRaven();
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
     * Bootstraps Raven and Monolog together
     */
    private function bootstrapRaven()
    {
        $sentryDsn = config('sentry.dsn', null);

        if (!empty($sentryDsn)) {
            $handler = new RavenHandler(app('sentry'));
            $handler->setFormatter(new LineFormatter("%message% %context% %extra%\n"));

            $monolog = Log::getMonolog();
            $monolog->pushHandler($handler);
        }
    }
}