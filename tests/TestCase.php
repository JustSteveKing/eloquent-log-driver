<?php

declare(strict_types=1);

namespace JustSteveKing\EloquentLogDriver\tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan(
            'migrate',
            ['--database' => 'sqlite']
        )->run();
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set(
            'database.connections.sqlite',
            [
            'driver' => 'sqlite',
            'database' => ':memory:'
            ]
        );

        $app['config']->set('logging.default', 'eloquent');
        $app['config']->set(
            'logging.channels',
            [
            'eloquent' => [
                'driver' => 'custom',
                'via' => \JustSteveKing\EloquentLogDriver\Logger\EloquentLogger::class
            ]
            ]
        );
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \JustSteveKing\EloquentLogDriver\ServiceProvider::class,
        ];
    }
}
