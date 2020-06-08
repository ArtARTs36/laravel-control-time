<?php

namespace Dba\ControlTime\Support;

use Dba\ControlTime\Models\Time;
use Dba\ControlTime\Models\WorkCondition;
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
    public static function getWorkConditionClass(): string
    {
        return config('controltime.work_condition.model_class', WorkCondition::class);
    }

    /**
     * @return string
     */
    public static function getWorkConditionTable(): string
    {
        return config('controltime.work_condition.table', 'controltime_work_conditions');
    }

    /**
     * @return string
     */
    public static function getTimeFormat(): string
    {
        return config('controltime.time.date_format', 'Y-m-d');
    }

    /**
     * @return string
     */
    public static function getTimeTable(): string
    {
        return config('controltime.time.table', 'times');
    }

    /**
     * @return string
     */
    public static function getTimeClass(): string
    {
        return config('controltime.time.model_class', Time::class);
    }

    /**
     * @return Builder
     */
    public static function getTimeBuilder()
    {
        $class = static::getTimeClass();

        return $class::query();
    }

    /**
     * @return string
     */
    public static function getApiRoutePrefix(): string
    {
        return config('controltime.api_route_prefix', 'controltime');
    }

    /**
     * @param string $route
     * @return string
     */
    public static function apiRoute(string $route): string
    {
        return static::getApiRoutePrefix()  . DIRECTORY_SEPARATOR . $route;
    }

    /**
     * @param string $route
     * @return string
     */
    public static function apiPath(string $route): string
    {
        return 'api/'. static::apiRoute($route);
    }
}
