<?php

declare(strict_types=1);

namespace JustSteveKing\EloquentLogDriver\Formatter;

use Illuminate\Support\Str;
use Monolog\Formatter\NormalizerFormatter;

class EloquentFormatter extends NormalizerFormatter
{
    /**
     * type
     */
    const LOG = 'log';
    const STORE = 'store';
    const CHANGE = 'change';
    const DELETE = 'delete';

    /**
     * result
     */
    const SUCCESS = 'success';
    const NEUTRAL = 'neutral';
    const FAILURE = 'failure';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public function format(array $record)
    {
        $record = parent::format($record);
        return $this->getDocument($record);
    }

    /**
     * Convert a log message into an DB Log entity
     *
     * @param  array $record
     * @return array
     */
    protected function getDocument(array $record)
    {
        $fills = $record['extra'];
        $filles['env'] = config('app.ennv');
        $fills['level'] = Str::lower($record['level_name']);
        $fills['message'] = $record['message'];
        $context = $record['context'];
        if (!empty($context)) {
            $fills['type'] = array_key_exists($context, 'type') ? $context['type'] : self::LOG;
            $fills['result'] = array_key_exists($context, 'result')  ? $context['result'] : self::NEUTRAL;
            $fills = array_merge($record['context'], $fills);
        }

        return $fills;
    }
}
