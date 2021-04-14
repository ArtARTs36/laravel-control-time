<?php

namespace ArtARTs36\ControlTime\Reports\Infrastructure\Support;

use ArtARTs36\FileStorageContracts\FileAlias;
use ArtARTs36\FileStorageContracts\FileStorage;

trait SaveContent
{
    protected $content;

    protected $extension = '';

    public function save(FileStorage $storage, string $name): FileAlias
    {
        return $storage->saveByContent($this->content, $name, $this->extension);
    }
}
