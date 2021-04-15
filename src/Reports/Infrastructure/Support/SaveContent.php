<?php

namespace ArtARTs36\ControlTime\Reports\Infrastructure\Support;

use ArtARTs36\FileStorageContracts\FileAlias;
use ArtARTs36\FileStorageContracts\FileStorage;
use ArtARTs36\LaravelFileStorage\Models\Section;

trait SaveContent
{
    abstract protected function getContent(): string;

    public function save(FileStorage $storage, Section $section): FileAlias
    {
        return $storage->saveByContent($this->getContent(), '', $this->extension, $section);
    }
}
