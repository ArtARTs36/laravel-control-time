<?php

namespace ArtARTs36\ControlTime\Reports\Target\Period;

use ArtARTs36\ControlTime\Contracts\ReportFile;
use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Reports\Infrastructure\FileObjects\JsonReportFile;
use Illuminate\Support\Collection;

class JsonPeriodReport extends PeriodReport
{
    protected function makeFile(Collection $data): ReportFile
    {
        return JsonReportFile::fromArray($this, $this->prepareData($data));
    }

    protected function prepareData(Collection $data): array
    {
        return $data
            ->map(function (Time $time) {
                return [
                    'Сотрудник' => $time->employee->getFamily(),
                    'Дата' => $time->date,
                    'Комментарий' => $time->comment,
                    'Часы' => $time->quantity,
                    'Субъект' => $time->subject->title,
                ];
            })
            ->all();
    }
}
