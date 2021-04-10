<?php

namespace ArtARTs36\ControlTime\Loaders\Excel\Columns;

use ArtARTs36\ControlTime\Http\DataTransferObjects\CreatingTime;
use ArtARTs36\ControlTime\Repositories\EmployeeRepository;

class TabNumberColumn extends AbstractExcelColumn
{
    protected $repo;

    public function __construct(EmployeeRepository $repo)
    {
        $this->repo = $repo;
    }

    public function apply(CreatingTime $time, ?string $value): ?\Closure
    {
        // @todo

        return null;
    }
}
