<?php

namespace ArtARTs36\ControlTime\Contracts;

use ArtARTs36\ControlTime\Http\DataTransferObjects\CreatingTime;
use Illuminate\Support\Collection;

interface TimeFileLoader
{
    /**
     * @return array<CreatingTime>
     */
    public function load(string $path): array;
}
