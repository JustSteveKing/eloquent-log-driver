<?php

declare(strict_types=1);

namespace JustSteveKing\EloquentLogDriver\Handler;

use Monolog\Logger;
use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\AbstractProcessingHandler;
use JustSteveKing\EloquentLogDriver\Models\DatabaseLog;
use JustSteveKing\EloquentLogDriver\Formatter\EloquentFormatter;

class EloquentHandler extends AbstractProcessingHandler
{
    public function __construct($level = Logger::DEBUG, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
    }

    protected function write(array $record): void
    {
        $log = DatabaseLog::create(
            [
            'env'     => $record['channel'],
            'message' => $record['message'],
            'level'   => $record['level_name'],
            'context' => $record['context'],
            'extra'   => $record['extra'],
            'user_id' => optional(auth()->user())->id ?? null
            ]
        );
    }

    /**
     * {@inheritDoc}
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new EloquentFormatter();
    }
}
