<?php

namespace Dba\ControlTime\Events;

use Dba\ControlTime\Models\Time;

/**
 * Class TimeDeleting
 * @package Dba\ControlTime\Events
 */
class TimeDeleting extends BaseDeletingEvent
{
    /** @var Time */
    public $time;

    /**
     * TimeDeleting constructor.
     * @param Time $time
     */
    public function __construct(Time $time)
    {
        $this->time = $time;
    }
}
