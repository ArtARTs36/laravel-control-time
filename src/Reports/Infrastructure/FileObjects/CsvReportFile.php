<?php

namespace ArtARTs36\ControlTime\Reports\Infrastructure\FileObjects;

use ArtARTs36\ControlTime\Contracts\ReportFile;
use ArtARTs36\FileStorageContracts\FileAlias;
use ArtARTs36\FileStorageContracts\FileStorage;
use League\Csv\Writer;

class CsvReportFile implements ReportFile
{
    protected $writer;

    public function __construct(Writer $writer)
    {
        $this->writer = $writer;
    }

    public function save(FileStorage $storage, string $name): FileAlias
    {
        return $storage->saveByContent($this->getContent(), $name, 'csv');
    }

    protected function getContent(): string
    {
        return $this->writer->toString();
    }
}
