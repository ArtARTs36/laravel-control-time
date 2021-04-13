<?php

namespace ArtARTs36\ControlTime\Repositories;

use ArtARTs36\ControlTime\Contracts\SubjectRepository;
use ArtARTs36\ControlTime\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class EloquentSubjectRepository extends Repository implements SubjectRepository
{
    protected function getModelClass(): string
    {
        return Subject::class;
    }

    /**
     * @return Subject|Model
     */
    public function create(string $title, string $code, int $typeId): Subject
    {
        return $this
            ->newQuery()
            ->create([
                Subject::FIELD_TITLE => $title,
                Subject::FIELD_CODE => $code,
                Subject::FIELD_TYPE_ID => $typeId,
            ]);
    }

    public function getByCodes(array $codes): Collection
    {
        return Subject::query()
            ->whereIn(Subject::FIELD_CODE, $codes)
            ->get();
    }
}
