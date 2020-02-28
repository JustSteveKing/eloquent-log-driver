<?php

declare(strict_types=1);

namespace JustSteveKing\EloquentLogDriver\Logger;

use Monolog\Logger;
use JustSteveKing\EloquentLogDriver\Handler\EloquentHandler;
use JustSteveKing\EloquentLogDriver\Processor\RequestProcessor;

class EloquentLogger
{
    public function __invoke(array $config)
    {
        $logger = new Logger('eloquent');
        $logger->pushHandler(new EloquentHandler());
        $logger->pushProcessor(new RequestProcessor());

        return $logger;
    }
}
