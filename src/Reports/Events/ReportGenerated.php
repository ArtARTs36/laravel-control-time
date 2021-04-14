<?php

namespace ArtARTs36\ControlTime\Reports\Events;

use ArtARTs36\ControlTime\Contracts\Report;
use ArtARTs36\ControlTime\Contracts\ReportFile;
use ArtARTs36\FileStorageContracts\FileAlias;

class ReportGenerated
{
    protected $report;

    protected $fileAlias;

    public function __construct(ReportFile $report, FileAlias $fileAlias)
    {
        $this->report = $report;
        $this->fileAlias = $fileAlias;
    }
}
