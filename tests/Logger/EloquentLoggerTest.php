<?php

declare(strict_types=1);

namespace JustSteveKing\EloquentLogDriver\Tests\Handler;

use Illuminate\Support\Facades\Log;
use JustSteveKing\EloquentLogDriver\Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use JustSteveKing\EloquentLogDriver\Models\DatabaseLog;

class EloquentLoggerTest extends TestCase
{
    use DatabaseMigrations;

    protected $table = 'database_logs';
    
    public function testEloquentLoggerCanLog()
    {
        Log::info("This is a test log");

        $this->assertDatabaseHas(
            $this->table,
            [
            'level' => 'INFO'
            ]
        );
    }

    public function testEloquentLoggerCanLogADebugLog()
    {
        Log::debug("This is a test log");

        $this->assertDatabaseHas(
            $this->table,
            [
            'level' => 'DEBUG'
            ]
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereDebug()->count()
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereLevel('DEBUG')->count()
        );
    }

    public function testEloquentLoggerCanLogAnInfoLog()
    {
        Log::info("This is a test log");

        $this->assertDatabaseHas(
            $this->table,
            [
            'level' => 'INFO'
            ]
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereInfo()->count()
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereLevel('INFO')->count()
        );
    }

    public function testEloquentLoggerCanLogANoticeLog()
    {
        Log::notice("This is a test log");

        $this->assertDatabaseHas(
            $this->table,
            [
            'level' => 'NOTICE'
            ]
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereNotice()->count()
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereLevel('NOTICE')->count()
        );
    }

    public function testEloquentLoggerCanLogAWarningLog()
    {
        Log::warning("This is a test log");

        $this->assertDatabaseHas(
            $this->table,
            [
            'level' => 'WARNING'
            ]
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereWarning()->count()
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereLevel('WARNING')->count()
        );
    }

    public function testEloquentLoggerCanLogAnErrorLog()
    {
        Log::error("This is a test log");

        $this->assertDatabaseHas(
            $this->table,
            [
            'level' => 'ERROR'
            ]
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereError()->count()
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereLevel('ERROR')->count()
        );
    }

    public function testEloquentLoggerCanLogACriticalLog()
    {
        Log::critical("This is a test log");

        $this->assertDatabaseHas(
            $this->table,
            [
            'level' => 'CRITICAL'
            ]
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereCritical()->count()
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereLevel('CRITICAL')->count()
        );
    }

    public function testEloquentLoggerCanLogAnAlertLog()
    {
        Log::alert("This is a test log");

        $this->assertDatabaseHas(
            $this->table,
            [
            'level' => 'ALERT'
            ]
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereAlert()->count()
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereLevel('ALERT')->count()
        );
    }

    public function testEloquentLoggerCanLogAnEmergencyLog()
    {
        Log::emergency("This is a test log");

        $this->assertDatabaseHas(
            $this->table,
            [
            'level' => 'EMERGENCY'
            ]
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereEmergency()->count()
        );

        $this->assertEquals(
            1,
            DatabaseLog::whereLevel('EMERGENCY')->count()
        );
    }
}
