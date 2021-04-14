<?php

namespace ArtARTs36\ControlTime\Reports\Infrastructure\Support;

use ArtARTs36\ControlTime\Reports\Data\ReportMeta;
use ArtARTs36\FileStorageContracts\FileAlias;
use ArtARTs36\FileStorageContracts\FileStorage;

trait SaveContent
{
    abstract protected function getContent(): string;

    public function save(FileStorage $storage, ReportMeta $meta): FileAlias
    {
        return $storage->saveByContent($this->getContent(), $meta->name, $this->extension, $meta->fileSection);
    }
}
