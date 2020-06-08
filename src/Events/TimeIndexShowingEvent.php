<?php

namespace Dba\ControlTime\Events;

use Illuminate\Database\Query\Builder;

/**
 * Class TimeIndexShowingEvent
 * @package Dba\ControlTime\Events
 */
class TimeIndexShowingEvent extends BaseIndexShowingEvent
{
    /** @var Builder */
    public $builder;

    /** @var string  */
    public $modelClass;

    /**
     * TimeIndexShowingEvent constructor.
     * @param Builder $builder
     * @param string $modelClass
     */
    public function __construct($builder, string $modelClass)
    {
        $this->builder = $builder;
        $this->modelClass = $modelClass;
    }
}
