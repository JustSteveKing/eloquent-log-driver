<?php

declare(strict_types=1);

namespace JustSteveKing\EloquentLogDriver\Processor;

class RequestProcessor
{
    public function __invoke(array $record): array
    {
        $request = request();

        $record['extra']['server'] = $request->server('SERVER_ADDR');
        $record['extra']['ip'] = $request->server('REMOTE_ADDR');
        $record['extra']['host'] = $request->getHost();
        $record['extra']['origin'] = $request->headers->get('origin');
        $record['extra']['uri'] = $request->getPathInfo();
        $record['extra']['request'] = $request->all();
        $record['extra']['user_agent'] = $request->server('HTTP_USER_AGENT');

        return $record;
    }
}
