<?php

namespace ArtARTs36\ControlTime\Providers;

use ArtARTs36\ControlTime\Contracts\SubjectRepository;
use ArtARTs36\ControlTime\Contracts\SubjectTypeRepository;
use ArtARTs36\ControlTime\Loaders\Excel\Columns\ColumnsDict;
use ArtARTs36\ControlTime\Loaders\Excel\Columns\SubjectCodeColumn;
use ArtARTs36\ControlTime\Reports\Data\ReportsDict;
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
        $this->app->bind(ColumnsDict::class, function () {
            return new ColumnsDict($this->getInstances(config('controltime.time.load_from_file.excel.fields')));
        });

        $this->app->bind(ReportsDict::class, function () {
            return new ReportsDict(
                $this->app['config']->get('controltime.reports')
            );
        });
    }

    protected function getInstances(array $dict): array
    {
        foreach ($dict as &$class) {
            $class = $this->app->make($class);
        }

        return $dict;
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function registerEloquentFactories(): void
    {
        $this->app->make(EloquentFactory::class)->load(static::ROOT_PATH . 'database/factories');
    }
}
