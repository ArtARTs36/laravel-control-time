<?php

namespace ArtARTs36\ControlTime\Reports\Data;

use ArtARTs36\ControlTime\Data\Period;

class ReportFilter
{
    public $employees;

    public $subjects;

    public $period;

    /**
     * @param array<int> $employees
     * @param array<int> $subjects
     */
    public function __construct(
        array $employees,
        array $subjects,
        Period $period
    ) {
        $this->employees = $employees;
        $this->subjects = $subjects;
        $this->period = $period;
    }
}
