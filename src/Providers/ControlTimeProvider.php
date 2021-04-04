<?php

namespace ArtARTs36\ControlTime\Providers;

use ArtARTs36\ControlTime\Contracts\SubjectRepository;
use ArtARTs36\ControlTime\Contracts\SubjectTypeRepository;
use ArtARTs36\ControlTime\Repositories\EloquentSubjectRepository;
use ArtARTs36\ControlTime\Repositories\EloquentSubjectTypeRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class ControlTimeProvider extends ServiceProvider
{
    protected const ROOT_PATH = __DIR__ . '/../../';

    public $bindings = [
        SubjectTypeRepository::class => EloquentSubjectTypeRepository::class,
        SubjectRepository::class => EloquentSubjectRepository::class,
    ];

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
