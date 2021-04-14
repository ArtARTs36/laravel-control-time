<?php

namespace ArtARTs36\ControlTime\Support;

use ArtARTs36\ControlTime\Contracts\ReportFile;
use ArtARTs36\ControlTime\Reports\Data\ReportBuildContext;
use ArtARTs36\ControlTime\Reports\Data\ReportFilter;
use ArtARTs36\ControlTime\Reports\Data\ReportMeta;
use ArtARTs36\ControlTime\Reports\Infrastructure\ReportBuilder;
use ArtARTs36\FileStorageContracts\FileStorage;
use ArtARTs36\FileStorageContracts\SectionRepository;

class ReportService
{
    protected $reports;

    protected $files;

    protected $sections;

    public function __construct(ReportBuilder $reports, FileStorage $files, SectionRepository $sections)
    {
        $this->reports = $reports;
        $this->files = $files;
        $this->sections = $sections;
    }

    /**
     * @return string path to file
     * @throws \ArtARTs36\ControlTime\Reports\Exceptions\ReportNotFound
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function createReport(ReportFilter $filter, string $name, string $extension): string
    {
        return $this->files->getRealPath(
            $this
                ->buildReport($filter, $name, $extension)
                ->save($this->files, new ReportMeta($name, $this->sections->findOrCreate('controltime')))->getFile()
        );
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
