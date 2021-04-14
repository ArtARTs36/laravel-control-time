<?php

namespace ArtARTs36\ControlTime\Data;

class Period
{
    public $start;

    public $end;

    public function __construct(\DateTimeInterface $start, \DateTimeInterface $end)
    {
        $this->start = $start;
        $this->end = $end;
    }
}
