<?php

namespace Dba\ControlTime\Events;

use Illuminate\Database\Query\Builder;

/**
 * Class BaseIndexShowingEvent
 * @package Dba\ControlTime\Events
 */
abstract class BaseIndexShowingEvent extends BaseEvent
{
    /**
     * @param Builder $builder
     * @param string $modelClass
     * @return static
     */
    public static function init($builder, string $modelClass)
    {
        return new static($builder, $modelClass);
    }
}
