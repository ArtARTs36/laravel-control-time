<?php

namespace ArtARTs36\ControlTime\Reports\Infrastructure\FileObjects;

use ArtARTs36\ControlTime\Contracts\ReportFile;
use ArtARTs36\ControlTime\Reports\Infrastructure\Support\SaveContent;

class JsonReportFile implements ReportFile
{
    use SaveContent;

    protected $content;

    protected $extension = 'json';

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public static function fromArray(array $data): self
    {
        return new static(json_encode($data));
    }

    protected function getContent(): string
    {
        return $this->content;
    }
}
