<?php

namespace ArtARTs36\ControlTime\Contracts;

use ArtARTs36\ControlTime\Reports\Data\ReportFilter;

interface Report
{
    public function make(ReportFilter $filter): ReportFile;
}
