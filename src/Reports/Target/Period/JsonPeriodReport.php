<?php

namespace ArtARTs36\ControlTime\Reports\Target\Period;

use ArtARTs36\ControlTime\Contracts\ReportFile;
use ArtARTs36\ControlTime\Reports\Infrastructure\FileObjects\JsonReportFile;
use Illuminate\Support\Collection;

class JsonPeriodReport extends PeriodReport
{
    protected function makeFile(Collection $data): ReportFile
    {
        return JsonReportFile::fromArray($data->toArray());
    }
}
