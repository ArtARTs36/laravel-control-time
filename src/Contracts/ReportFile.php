<?php

namespace ArtARTs36\ControlTime\Contracts;

use ArtARTs36\ControlTime\Reports\Data\ReportMeta;
use ArtARTs36\FileStorageContracts\FileAlias;
use ArtARTs36\FileStorageContracts\FileStorage;

interface ReportFile
{
    public function save(FileStorage $storage, ReportMeta $meta): FileAlias;

    public function getReport(): Report;
}
