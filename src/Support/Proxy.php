<?php

namespace ArtARTs36\ControlTime\Support;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Proxy
 * @package ArtARTs36\ControlTime\Support
 */
class Proxy
{
    /**
     * @return string
     */
    public static function getApiRoutePrefix(): string
    {
        return config('controltime.routes.api.prefix', 'controltime');
    }

    /**
     * @param string $route
     * @return string
     */
    public static function apiRoute(string $route): string
    {
        return static::getApiRoutePrefix()  . DIRECTORY_SEPARATOR . $route;
    }
}
