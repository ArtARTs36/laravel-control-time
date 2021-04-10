<?php

namespace ArtARTs36\ControlTime\Exceptions;

use ArtARTs36\ControlTime\Http\DataTransferObjects\CreatingTime;
use Throwable;

class TimeAlreadyExists extends \LogicException
{
    public $errorTimeData;

    public function __construct(CreatingTime $data, $code = 422, Throwable $previous = null)
    {
        $this->errorTimeData = $data;

        parent::__construct($this->prepareMessage(), $code, $previous);
    }

    protected function prepareMessage(): string
    {
        return "Списание уже существует";
    }
}
