<?php

namespace ArtARTs36\ControlTime\Support;

use ArtARTs36\ControlTime\Contracts\ReportFile;
use ArtARTs36\ControlTime\Reports\Data\DownloadReport;
use ArtARTs36\ControlTime\Reports\Data\ReportBuildContext;
use ArtARTs36\ControlTime\Reports\Data\ReportFilter;
use ArtARTs36\ControlTime\Reports\Data\ReportMeta;
use ArtARTs36\ControlTime\Reports\Events\ReportGenerated;
use ArtARTs36\ControlTime\Reports\Infrastructure\ReportBuilder;
use ArtARTs36\FileStorageContracts\FileStorage;
use ArtARTs36\FileStorageContracts\SectionRepository;
use Illuminate\Contracts\Events\Dispatcher;

class ReportService
{
    protected $reports;

    protected $files;

    protected $sections;

    protected $events;

    public function __construct(
        ReportBuilder $reports,
        FileStorage $files,
        SectionRepository $sections,
        Dispatcher $events
    ) {
        $this->reports = $reports;
        $this->files = $files;
        $this->sections = $sections;
        $this->events = $events;
    }

    /**
     * @throws \ArtARTs36\ControlTime\Reports\Exceptions\ReportNotFound
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function createReport(ReportFilter $filter, string $name, string $extension): DownloadReport
    {
        $report = $this->buildReport($filter, $name, $extension);
        $fileAlias = $report->save($this->files, new ReportMeta($name, $this->sections->findOrCreate('controltime')));

        $this->events->dispatch(new ReportGenerated($report, $fileAlias));

        return new DownloadReport($this->files->getRealPath($fileAlias->getFile()), $fileAlias->getFileName());
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \ArtARTs36\ControlTime\Reports\Exceptions\ReportNotFound
     */
    public function buildReport(ReportFilter $filter, string $name, string $extension): ReportFile
    {
        return $this->reports->build(new ReportBuildContext($name, $filter, $extension));
    }
}
