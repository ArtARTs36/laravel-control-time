<?php

namespace ArtARTs36\ControlTime\Contracts;

interface ReportFile
{
    public function saveAs(string $path): bool;
}
