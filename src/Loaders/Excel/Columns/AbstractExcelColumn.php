<?php

namespace ArtARTs36\ControlTime\Loaders\Excel\Columns;

use ArtARTs36\ControlTime\Http\DataTransferObjects\CreatingTime;

abstract class AbstractExcelColumn
{
    abstract public function apply(CreatingTime $time, ?string $value): ?\Closure;

    public function finish(): void
    {
        //
    }
}
