<?php

namespace ArtARTs36\ControlTime\Reports\Data;

class DownloadReport
{
    public $path;

    public $name;

    public function __construct(string $path, string $name)
    {
        $this->path = $path;
        $this->name = $name;
    }
}
