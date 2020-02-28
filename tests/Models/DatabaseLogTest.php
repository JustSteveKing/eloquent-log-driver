<?php

declare(strict_types=1);

namespace JustSteveKing\EloquentLogDriver\Tests\Handler;

use JustSteveKing\EloquentLogDriver\tests\TestCase;
use JustSteveKing\EloquentLogDriver\Models\DatabaseLog;

class DatabaseLogTest extends TestCase
{
    public function testDatabaseLogCanBeCreated()
    {
        $log = DatabaseLog::create(
            [
            'env' => 'local',
            'message' => 'test message',
            'level' => 'INFO',
            'context' => [
                ['foo' => 'bar']
            ],
            'extra' => [
                'test' => [
                    'foo' => 'bar'
                ]
            ],
            'user_id' => 1
            ]
        );

        $this->assertNotNull($log);

        $this->assertEquals(1, DatabaseLog::count());
    }
}
