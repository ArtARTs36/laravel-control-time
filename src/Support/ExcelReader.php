<?php

namespace ArtARTs36\ControlTime\Support;

class ExcelReader
{
    public function readFile(string $path): array
    {
        $data = $this->createExcel($path)
            ->openFile(pathinfo($path, PATHINFO_BASENAME))
            ->openSheet()
            ->getSheetData();

        return array_filter(array_map(function (array $item) {
            return array_map('trim', $item);
        }, $data));
    }

    protected function createExcel(string $path): \Vtiful\Kernel\Excel
    {
        $config = [
            'path' => realpath(pathinfo($path, PATHINFO_DIRNAME)),
        ];

        return new \Vtiful\Kernel\Excel($config);
    }
}
