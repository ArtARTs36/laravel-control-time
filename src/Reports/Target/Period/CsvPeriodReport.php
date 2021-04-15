<?php

namespace ArtARTs36\ControlTime\Reports\Target\Period;

use ArtARTs36\ControlTime\Contracts\Report;
use ArtARTs36\ControlTime\Contracts\ReportFile;
use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Reports\Infrastructure\FileObjects\CsvReportFile;
use ArtARTs36\ControlTime\Reports\Infrastructure\Support\MakeCsv;
use Illuminate\Support\Collection;

class CsvPeriodReport extends PeriodReport implements Report
{
    use MakeCsv;

    protected $headers = [
        'Сотрудник',
        'Субъект',
        'Дата',
        'Часы',
    ];

    protected function makeFile(Collection $data, string $title): ReportFile
    {
        return new CsvReportFile(
            $this,
            $this->makeCsvWriter(
                $this->headers,
                $this->prepareRecords($data)
            ),
            $title
        );
    }

    protected function prepareRecords(Collection $data): array
    {
        return $data
            ->map(function (Time $time) {
                return [
                    $time->employee->getFullName(),
                    $time->subject->getFullTitle(),
                    $time->date,
                    $time->getHours(),
                ];
            })
            ->all();
    }
}
