<?php

namespace Dba\ControlTime\Http\DataTransferObjects;

use Dba\ControlTime\Http\Support\DataTransferObject;

class CreatingTime extends DataTransferObject
{
    /** @var string */
    public $date;

    /** @var int */
    public $quantity;

    /** @var int */
    public $employee_id;

    /** @var string */
    public $comment;
}
