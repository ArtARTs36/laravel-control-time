<?php

namespace ArtARTs36\ControlTime\Reports\Data;

use ArtARTs36\FileStorageContracts\Section;

class ReportMeta
{
    public $name;

    public $fileSection;

    public function __construct(string $name, Section $section)
    {
        $this->name = $name;
        $this->fileSection = $section;
    }
}
