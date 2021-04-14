<?php

namespace ArtARTs36\ControlTime\Reports\Infrastructure\Support;

use League\Csv\Writer;

trait MakeCsv
{
    protected function makeCsvWriter(array $header, array $records): Writer
    {
        $writer = Writer::createFromString();

        $writer->insertOne($header);
        $writer->insertAll($records);

        return $writer;
    }
}
