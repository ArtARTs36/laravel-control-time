<?php

namespace Dba\ControlTime\Events;

use Dba\ControlTime\Models\Time;

/**
 * Class TimeCreating
 * @package Dba\ControlTime\Events
 */
class TimeCreating extends BaseCreatingEvent
{
    /** @var array */
    public $fields;

    /** @var Time */
    public $time;

    /**
     * TimeCreating constructor.
     * @param array $fields
     * @param Time $time
     */
    public function __construct(array $fields, Time $time)
    {
        $this->fields = $fields;
        $this->time = $time;
    }
}
