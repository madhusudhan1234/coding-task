<?php

namespace App\Bootstrap;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Bootstrap\ConfigureLogging as DefaultLogging;
use Illuminate\Log\Writer;
use Monolog\Handler\LogglyHandler;

class ConfigureLogging extends DefaultLogging
{
    /**
     * @param Application $app
     * @param Writer $log
     */
    public function configureCustomHandler(Application $app, Writer $log)
    {
        $handler = new LogglyHandler(env('LOGGLY_TOKEN'));

        $handler->setTag('CodingTest');

        $log->getMonolog()->pushHandler($handler);
        $log->useDailyFiles($app->storagePath() . '/logs/laravel.log', 5);
    }
}