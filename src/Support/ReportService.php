<?php

namespace ArtARTs36\ControlTime\Support;

use ArtARTs36\ControlTime\Contracts\ReportFile;
use ArtARTs36\ControlTime\Reports\Data\ReportBuildContext;
use ArtARTs36\ControlTime\Reports\Data\ReportFilter;
use ArtARTs36\ControlTime\Reports\Infrastructure\ReportBuilder;
use ArtARTs36\FileStorageContracts\FileStorage;

class ReportService
{
    protected $reports;

    protected $files;

    public function __construct(ReportBuilder $reports, FileStorage $files)
    {
        $this->reports = $reports;
        $this->files = $files;
    }

    /**
     * @return string path to file
     * @throws \ArtARTs36\ControlTime\Reports\Exceptions\ReportNotFound
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function createReport(ReportFilter $filter, string $name, string $extension): string
    {
        return $this->files->getRealPath($this->files->saveByContent(
            $this->buildReport($filter, $name, $extension)->getContent(),
            $name,
            $extension
        )->getFile());
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
