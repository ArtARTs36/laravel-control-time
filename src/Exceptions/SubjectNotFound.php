<?php

namespace ArtARTs36\ControlTime\Exceptions;

use Throwable;

class SubjectNotFound extends ControlTimeException
{
    public $errorSubjectCode;

    public function __construct(string $subjectCode, $code = 0, Throwable $previous = null)
    {
        $this->errorSubjectCode = $subjectCode;

        $message = "Subject by code $subjectCode not found";

        parent::__construct($message, $code, $previous);
    }
}
