<?php

namespace ArtARTs36\ControlTime\Reports\Data;

use ArtARTs36\ControlTime\Contracts\Report;
use ArtARTs36\ControlTime\Reports\Exceptions\ReportNotFound;

class ReportsDict implements \IteratorAggregate
{
    protected $reports;

    /**
     * @param array<string, array<string, string>> $reports
     */
    public function __construct(array $reports)
    {
        $this->reports = $reports;
    }

    /**
     * @return string class
     * @throws ReportNotFound
     */
    public function get(string $name, string $extension): string
    {
        if (! $this->has($name, $extension)) {
            throw new ReportNotFound($name, $extension);
        }

        return $this->reports[$name][$extension];
    }

    public function has(string $name, string $extension): bool
    {
        return isset($this->reports[$name][$extension]);
    }

    /**
     * @return \ArrayIterator|iterable<string, array<string, string>>
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->reports);
    }
}
