<?php

namespace ArtARTs36\ControlTime\Reports\Infrastructure\FileObjects;

use ArtARTs36\ControlTime\Contracts\Report;

abstract class AbstractReportFile
{
    private $report;

    private $title;

    public function __construct(Report $report, string $title)
    {
        $this->report = $report;
        $this->title = $title;
    }

    public function getReport(): Report
    {
        return $this->report;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
