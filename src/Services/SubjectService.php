<?php

namespace ArtARTs36\ControlTime\Services;

use ArtARTs36\ControlTime\Contracts\SubjectRepository;
use ArtARTs36\ControlTime\Models\Subject;
use ArtARTs36\ControlTime\Models\SubjectType;
use Illuminate\Support\Str;

class SubjectService
{
    protected $subjects;

    protected $code;

    public function __construct(SubjectRepository $subjects, SubjectCodeGenerator $code)
    {
        $this->subjects = $subjects;
        $this->code = $code;
    }

    public function create(string $title, SubjectType $type, ?string $code = null): Subject
    {
        return $this->subjects->create($title, $code ?? $this->code->gen($type, $title), $type->id);
    }
}
