<?php

namespace ArtARTs36\ControlTime\Loaders\Excel\Columns;

use ArtARTs36\ControlTime\Contracts\SubjectRepository;
use ArtARTs36\ControlTime\Exceptions\SubjectNotFound;
use ArtARTs36\ControlTime\Http\DataTransferObjects\CreatingTime;
use ArtARTs36\ControlTime\Models\Subject;
use Illuminate\Support\Collection;

class SubjectCodeColumn extends AbstractExcelColumn
{
    /** @var Collection|array<string, Subject> */
    protected $subjects;

    protected $repo;

    protected $codes;

    /**
     * @codeCoverageIgnore
     */
    public function __construct(SubjectRepository $repo)
    {
        $this->repo = $repo;
    }

    public function apply(CreatingTime $time, ?string $value): ?\Closure
    {
        $this->codes[$value] = $value;

        return function () use ($time, $value) {
            if (! $this->subjects->has($value)) {
                throw new SubjectNotFound($value);
            }

            $time->subject_id = $this->subjects[$value]->id;
        };
    }

    public function finish(): void
    {
        $this->subjects = $this->repo->getByCodes($this->codes)->pluck(null, Subject::FIELD_CODE);
    }
}
