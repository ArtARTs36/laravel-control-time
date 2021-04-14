<?php

namespace ArtARTs36\ControlTime\Contracts;

use ArtARTs36\FileStorageContracts\FileAlias;
use ArtARTs36\FileStorageContracts\FileStorage;

interface ReportFile
{
    public function save(FileStorage $storage, string $name): FileAlias;
}
