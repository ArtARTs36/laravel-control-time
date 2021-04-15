<?php

namespace ArtARTs36\ControlTime\Contracts;

use ArtARTs36\FileStorageContracts\FileAlias;
use ArtARTs36\FileStorageContracts\FileStorage;
use ArtARTs36\LaravelFileStorage\Models\Section;

interface ReportFile
{
    public function save(FileStorage $storage, Section $section): FileAlias;

    public function getReport(): Report;

    public function getTitle(): string;
}
