<?php

namespace ArtARTs36\ControlTime\Repositories;

use ArtARTs36\ControlTime\Models\Subject;
use ArtARTs36\ControlTime\Models\SubjectType;
use Illuminate\Database\Eloquent\Model;

class SubjectTypeRepository extends Repository
{
    protected function getModelClass(): string
    {
        return SubjectType::class;
    }

    /**
     * @return Subject|Model
     */
    public function create(string $slug, string $title): Subject
    {
        return Subject::query()->create([
            SubjectType::FIELD_SLUG => $slug,
            SubjectType::FIELD_TITLE => $title,
        ]);
    }

    /**
     * @return Subject|Model|null
     */
    public function findBySlug(string $slug): ?Subject
    {
        return $this->newQuery()->where(SubjectType::FIELD_SLUG, $slug)->firstOrFail();
    }
}
