<?php

namespace ArtARTs36\ControlTime\Http\Controllers;

use ArtARTs36\ControlTime\Http\Requests\ReportBuildRequest;
use ArtARTs36\ControlTime\Support\ReportService;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TimeReportController extends BaseController
{
    protected $service;

    public function __construct(ReportService $service)
    {
        $this->service = $service;
    }

    public function report(ReportBuildRequest $request, string $name, string $extension): BinaryFileResponse
    {
        $report = $this->service->createReport(
            $request->toReportFilter(),
            $name,
            $extension
        );

        return response()->download($report->path, $report->name);
    }
}
