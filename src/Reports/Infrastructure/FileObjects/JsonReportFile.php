<?php

namespace ArtARTs36\ControlTime\Reports\Infrastructure\FileObjects;

use ArtARTs36\ControlTime\Contracts\Report;
use ArtARTs36\ControlTime\Contracts\ReportFile;
use ArtARTs36\ControlTime\Reports\Infrastructure\Support\SaveContent;

class JsonReportFile extends AbstractReportFile implements ReportFile
{
    use SaveContent;

    protected $content;

    protected $extension = 'json';

    public function __construct(Report $report, string $content)
    {
        $this->content = $content;

        parent::__construct($report);
    }

    public static function fromArray(Report $report, array $data): self
    {
        return new static($report, json_encode($data));
    }

    protected function getContent(): string
    {
        return $this->content;
    }
}
