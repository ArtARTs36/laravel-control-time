<?php

namespace Dba\ControlTime\Events;

use Illuminate\Database\Eloquent\Model;

abstract class BaseCreatingEvent extends BaseEvent
{
    /**
     * Factory method
     *
     * @param array $fields
     * @param Model $model
     * @return static
     */
    public static function init(array $fields, Model $model)
    {
        return new static($fields, $model);
    }
}
