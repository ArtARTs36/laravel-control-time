<?php

namespace ArtARTs36\ControlTime\Reports\Data;

class ReportFilter
{
    public $employees;

    public $subjects;

    public $start;

    public $end;

    /**
     * @param array<int> $employees
     * @param array<int> $subjects
     */
    public function __construct(
        array $employees,
        array $subjects,
        \DateTimeInterface $start,
        \DateTimeInterface $end
    ) {
        $this->employees = $employees;
        $this->subjects = $subjects;
        $this->start = $start;
        $this->end = $end;
    }
}
