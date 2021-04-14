<?php

namespace ArtARTs36\ControlTime\Reports\Target\Period;

use ArtARTs36\ControlTime\Contracts\ReportFile;
use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Reports\Data\ReportFilter;
use ArtARTs36\ControlTime\Repositories\TimeRepository;
use Illuminate\Support\Collection;

abstract class PeriodReport
{
    protected $repo;

    /**
     * @param Collection|iterable<Time> $data
     * @return ReportFile
     */
    abstract protected function makeFile(Collection $data): ReportFile;

    public function __construct(TimeRepository $repo)
    {
        $this->repo = $repo;
    }

    public function make(ReportFilter $filter): ReportFile
    {
        return $this->makeFile($this->repo->getByPeriod($filter->period, $filter->employees, $filter->subjects));
    }
}
