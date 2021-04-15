<?php

namespace ArtARTs36\ControlTime\Reports\Target\Period;

use ArtARTs36\ControlTime\Contracts\Report;
use ArtARTs36\ControlTime\Contracts\ReportFile;
use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Reports\Data\ReportFilter;
use ArtARTs36\ControlTime\Repositories\TimeRepository;
use Illuminate\Support\Collection;

abstract class PeriodReport implements Report
{
    protected $repo;

    /**
     * @param Collection|iterable<Time> $data
     */
    abstract protected function makeFile(Collection $data, string $title): ReportFile;

    public function __construct(TimeRepository $repo)
    {
        $this->repo = $repo;
    }

    public function make(ReportFilter $filter): ReportFile
    {
        return $this
            ->makeFile(
                $this->repo->getByPeriod($filter->period, $filter->employees, $filter->subjects),
                $this->buildTitle($filter)
            );
    }

    protected function buildTitle(ReportFilter $filter): string
    {
        return 'Отчет за: '
            . $filter->period->start->format('Y-m-d')
            . ' - '
            . $filter->period->end->format('Y-m-d');
    }
}
