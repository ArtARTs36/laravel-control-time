<?php

namespace Dba\ControlTime\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteProvider extends RouteServiceProvider
{
    protected $namespace = 'Dba\ControlTime\Http\Controllers';

    public function map(): void
    {
        $this->mapApiRoutes();
    }

    protected function mapApiRoutes(): void
    {
        Route::prefix(config('controltime.routes.api.prefix', ''))
            ->middleware(config('controltime.routes.api.middleware'))
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../../routes/api.php');
    }
}
