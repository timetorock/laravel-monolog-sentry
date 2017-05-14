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
        if (app()->bound('sentry')) {
            $handler = new RavenHandler(app('sentry'), config('sentry.level', Logger::WARNING));
            $handler->setFormatter(new LineFormatter("%message% %context% %extra%\n"));

            $monolog = Log::getMonolog();
            $monolog->pushHandler($handler);
        }
    }
}