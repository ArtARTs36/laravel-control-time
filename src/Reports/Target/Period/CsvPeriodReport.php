<?php

namespace ArtARTs36\ControlTime\Reports\Target\Period;

use ArtARTs36\ControlTime\Contracts\Report;
use ArtARTs36\ControlTime\Contracts\ReportFile;
use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Reports\Infrastructure\FileObjects\CsvReportFile;
use ArtARTs36\ControlTime\Reports\Infrastructure\Support\MakeCsv;
use ArtARTs36\EmployeeInterfaces\Employee\EmployeeInterface;
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

    protected function makeFile(Collection $data): ReportFile
    {
        return new CsvReportFile($this->makeCsvWriter(
            $this->headers,
            $this->prepareRecords($data)
        ));
    }

    protected function prepareRecords(Collection $data): array
    {
        return $data
            ->map(function (Time $time) {
                return [
                    $this->prepareEmployeeFullName($time->employee),
                    $time->subject->title . ' [' . $time->subject->code . ']',
                    $time->date,
                    $time->getHours(),
                ];
            })
            ->all();
    }

    protected function prepareEmployeeFullName(EmployeeInterface $employee): string
    {
        return implode(' ', [
            $employee->getFamily(),
            $employee->getName(),
            $employee->getPatronymic(),
        ]);
    }
}
