<?php

namespace ArtARTs36\ControlTime\Loaders\Excel;

use ArtARTs36\ControlTime\Contracts\TimeFileLoader;
use ArtARTs36\ControlTime\Data\CreatingTimeNullable;
use ArtARTs36\ControlTime\Loaders\Excel\Columns\ColumnsDict;
use ArtARTs36\ControlTime\Support\ExcelReader;

class TimeXlsxLoader implements TimeFileLoader
{
    protected $excel;

    protected $columns;

    public function __construct(ExcelReader $excel, ColumnsDict $columns)
    {
        $this->excel = $excel;
        $this->columns = $columns;
    }

    public function load(string $path): array
    {
        [$headers, $data] = $this->injectHeadersAndData($this->excel->readFile($path));

        $callbacks = [];

        $times = [];

        foreach ($data as $item) {
            $time = new CreatingTimeNullable();

            foreach ($item as $index => $value) {
                $callbacks[] = $this->columns->get($headers[$index])->apply($time, $value);
            }

            $times[] = $time;
        }

        foreach ($this->columns as $column) {
            $column->finish();
        }

        foreach (array_filter($callbacks) as $callback) {
            $callback();
        }

        return $times;
    }

    protected function injectHeadersAndData(array $data): array
    {
        return [
            $data[array_key_first($data)],
            array_slice($data, 1),
        ];
    }
}
