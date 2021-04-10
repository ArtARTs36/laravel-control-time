<?php

namespace ArtARTs36\ControlTime\Loaders\Excel\Columns;

use ArtARTs36\ControlTime\Exceptions\ColumnNotFound;

class ColumnsDict implements \IteratorAggregate
{
    protected $columns;

    /**
     * @param array<string, AbstractExcelColumn> $columns
     */
    public function __construct(array $columns)
    {
        $this->columns = $columns;
    }

    public function get(string $key): AbstractExcelColumn
    {
        if (! $this->has($key)) {
            throw new ColumnNotFound();
        }

        return $this->columns[$key];
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->columns);
    }

    /**
     * @return \ArrayIterator|iterable<AbstractExcelColumn>
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->columns);
    }
}
