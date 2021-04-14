<?php

namespace ArtARTs36\ControlTime\Reports\Exceptions;

use ArtARTs36\ControlTime\Exceptions\ControlTimeException;
use Throwable;

class ReportNotFound extends ControlTimeException
{
    public function __construct(string $name, string $extension, $code = 0, Throwable $previous = null)
    {
        $message = "Report $name by extension '$extension' not found!";

        parent::__construct($message, $code, $previous);
    }
}
