<?php

namespace ArtARTs36\ControlTime\Http\DataTransferObjects;

use ArtARTs36\ControlTime\Http\Support\DataTransferObject;
use Carbon\Carbon;

class CreatingTime extends DataTransferObject
{
    /** @var string */
    public $date;

    /** @var int */
    public $quantity;

    /** @var int */
    public $employee_id;

    /** @var string|null */
    public $comment;

    /** @var int */
    public $subject_id;

    public function getDate(): \DateTimeInterface
    {
        return Carbon::parse($this->date);
    }
}
