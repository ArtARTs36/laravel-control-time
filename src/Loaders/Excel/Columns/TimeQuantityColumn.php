<?php

namespace ArtARTs36\ControlTime\Loaders\Excel\Columns;

use ArtARTs36\ControlTime\Http\DataTransferObjects\CreatingTime;

class TimeQuantityColumn extends AbstractExcelColumn
{
    public function apply(CreatingTime $time, ?string $value): ?\Closure
    {
        $time->quantity = (int) $value;

        return null;
    }
}
