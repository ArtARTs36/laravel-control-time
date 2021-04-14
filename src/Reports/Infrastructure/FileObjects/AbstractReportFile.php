<?php

namespace ArtARTs36\ControlTime\Reports\Infrastructure\FileObjects;

use ArtARTs36\ControlTime\Contracts\Report;

abstract class AbstractReportFile
{
    private $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    public function getReport(): Report
    {
        return $this->report;
    }
}
