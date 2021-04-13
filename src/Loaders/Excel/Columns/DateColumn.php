<?php

namespace ArtARTs36\ControlTime\Loaders\Excel\Columns;

use ArtARTs36\ControlTime\Http\DataTransferObjects\CreatingTime;
use ArtARTs36\ControlTime\Support\Excel;

class DateColumn extends AbstractExcelColumn
{
    public function apply(CreatingTime $time, ?string $value): ?\Closure
    {
        $time->date = Excel::intToDateString($value);

        return null;
    }
}
