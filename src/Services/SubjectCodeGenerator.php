<?php

namespace ArtARTs36\ControlTime\Services;

use ArtARTs36\ControlTime\Models\SubjectType;
use Illuminate\Support\Str;

class SubjectCodeGenerator
{
    protected $separator = '_';

    public function gen(SubjectType $type, string $subjectTitle): string
    {
        return Str::slug($type->title, $this->separator)
            . $this->separator
            . Str::slug(mb_substr($subjectTitle, 0, 15), $this->separator)
            . $this->separator
            . $this->date();
    }

    protected function date(): string
    {
        return date("Y" . $this->separator . "m");
    }
}
