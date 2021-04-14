<?php

namespace ArtARTs36\ControlTime\Reports\Data;

class ReportBuildContext
{
    public $name;

    public $filter;

    public $extension;

    public function __construct(string $name, ReportFilter $filter, string $extension)
    {
        $this->name = $name;
        $this->filter = $filter;
        $this->extension = $extension;
    }
}
