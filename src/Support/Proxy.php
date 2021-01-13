<?php

namespace Dba\ControlTime\Support;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Proxy
 * @package Dba\ControlTime\Support
 */
class Proxy
{
    /**
     * @return int
     */
    public static function getTimeIndexShowingCount(): int
    {
        return config('controltime.time.index_showing.page_count', 10);
    }

    /**
     * @return string
     */
    public static function getEmployeeClass(): string
    {
        return config('controltime.employee.model_class');
    }

    /**
     * @return Builder
     */
    public static function getEmployeeBuilder(): Builder
    {
        $class = static::getEmployeeClass();

        return $class::query();
    }

    /**
     * @return string
     */
    public static function getEmployeeTable(): string
    {
        return config('controltime.employee.table', 'controltime_employee');
    }

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
