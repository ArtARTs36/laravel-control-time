<?php

namespace ArtARTs36\ControlTime\Reports\Infrastructure\FileObjects;

use ArtARTs36\ControlTime\Contracts\ReportFile;

class JsonReportFile implements ReportFile
{
    protected $json;

    public function __construct(string $json)
    {
        $this->json = $json;
    }

    public static function fromArray(array $data): self
    {
        return new static(json_encode($data));
    }

    public function saveAs(string $path): bool
    {
        return file_put_contents($path, $this->getContent()) !== false;
    }

    public function getContent(): string
    {
        return $this->json;
    }
}
