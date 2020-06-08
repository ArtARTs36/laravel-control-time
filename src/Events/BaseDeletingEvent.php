<?php

namespace Dba\ControlTime\Events;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseDeletingEvent
 * @package Dba\ControlTime\Events
 */
abstract class BaseDeletingEvent extends BaseEvent
{
    /**
     * Factory method
     *
     * @param Model $model
     * @return static
     */
    public static function init(Model $model)
    {
        return new static($model);
    }
}
