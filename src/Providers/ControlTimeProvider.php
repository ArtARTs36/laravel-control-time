<?php

namespace ArtARTs36\ControlTime\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class ControlTimeProvider extends ServiceProvider
{
    protected const ROOT_PATH = __DIR__ . '/../../';

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                static::ROOT_PATH . 'config/controltime.php' => config_path('controltime.php'),
            ], 'controltime');

            $this->loadMigrationsFrom(self::ROOT_PATH . 'database/migrations');

            $this->registerEloquentFactories();

            $this->mergeConfigFrom(static::ROOT_PATH . 'config/controltime.php', 'controltime');
        }

        $this->app->register(RouteProvider::class);
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function registerEloquentFactories(): void
    {
        $this->app->make(EloquentFactory::class)->load(static::ROOT_PATH . 'database/factories');
    }
}
