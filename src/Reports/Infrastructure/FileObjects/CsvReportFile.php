<?php

namespace ArtARTs36\ControlTime\Reports\Infrastructure\FileObjects;

use ArtARTs36\ControlTime\Contracts\Report;
use ArtARTs36\ControlTime\Contracts\ReportFile;
use ArtARTs36\ControlTime\Reports\Infrastructure\Support\SaveContent;
use League\Csv\Writer;

class CsvReportFile extends AbstractReportFile implements ReportFile
{
    use SaveContent;

    protected $writer;

    protected $extension = 'csv';

    public function __construct(Report $report, Writer $writer)
    {
        $this->writer = $writer;

        parent::__construct($report);
    }

    protected function getContent(): string
    {
        return $this->writer->toString();
    }
}
