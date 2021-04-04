<?php

namespace ArtARTs36\ControlTime\Repositories;

use ArtARTs36\ControlTime\Contracts\SubjectTypeRepository;
use ArtARTs36\ControlTime\Models\SubjectType;
use Illuminate\Database\Eloquent\Model;

class EloquentSubjectTypeRepository extends Repository implements SubjectTypeRepository
{
    protected function getModelClass(): string
    {
        return SubjectType::class;
    }

    /**
     * @return SubjectType|Model
     */
    public function create(string $slug, string $title): SubjectType
    {
        return SubjectType::query()->create([
            SubjectType::FIELD_SLUG => $slug,
            SubjectType::FIELD_TITLE => $title,
        ]);
    }

    /**
     * @return SubjectType|Model|null
     */
    public function findBySlug(string $slug): ?SubjectType
    {
        return $this->newQuery()->where(SubjectType::FIELD_SLUG, $slug)->firstOrFail();
    }
}
