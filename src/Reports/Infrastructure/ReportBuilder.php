<?php

namespace ArtARTs36\ControlTime\Reports\Infrastructure;

use ArtARTs36\ControlTime\Contracts\ReportFile;
use ArtARTs36\ControlTime\Reports\Data\ReportBuildContext;
use ArtARTs36\ControlTime\Reports\Infrastructure\Factories\ReportFactory;

class ReportBuilder
{
    protected $reports;

    public function __construct(ReportFactory $reports)
    {
        $this->reports = $reports;
    }

    /**
     * @throws \ArtARTs36\ControlTime\Reports\Exceptions\ReportNotFound
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function build(ReportBuildContext $context): ReportFile
    {
        return $this
            ->reports
            ->factory($context->name, $context->extension)
            ->make($context->filter);
    }
}
