<?php

namespace ArtARTs36\ControlTime\Reports\Infrastructure\FileObjects;

use ArtARTs36\ControlTime\Contracts\ReportFile;
use League\Csv\Writer;

class CsvReportFile implements ReportFile
{
    protected $writer;

    public function __construct(Writer $writer)
    {
        $this->writer = $writer;
    }

    public function saveAs(string $path): bool
    {
        return file_put_contents($path, $this->getContent()) !== false;
    }

    public function getContent(): string
    {
        return $this->writer->toString();
    }
}
