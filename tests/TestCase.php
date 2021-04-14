<?php

namespace ArtARTs36\ControlTime\Tests;

use ArtARTs36\ControlTime\Providers\ControlTimeProvider;
use ArtARTs36\ControlTime\Tests\Prototypes\User;
use ArtARTs36\FileStorageContracts\FileStorage;
use ArtARTs36\LaravelFileStorage\Providers\FileStorageProvider;
use ArtARTs36\LaravelFileStorage\Services\LocalFileStorage;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    use DatabaseTransactions;

    public function setup() : void
    {
        parent::setUp();

        $this->artisan('migrate', ['--database' => 'testing']);

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadLaravelMigrations(['--database' => 'testing']);
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');

        $this->withFactories(__DIR__.'/../database/factories');
        $this->withFactories(__DIR__.'/Database/factories');
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', 'AckfSECXIvnK5r28GVIWUAxmbBSjTsmF');
        $app['config']->set('app.debug', true);
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $app->bind(FileStorage::class, LocalFileStorage::class);
    }

    protected function getPackageProviders($app)
    {
        return [
            ControlTimeProvider::class,
            FileStorageProvider::class,
        ];
    }

    protected function createEmployee()
    {
        return User::query()->create([
            'name' => Str::random(),
        ]);
    }
}
