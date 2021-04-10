<?php

namespace ArtARTs36\ControlTime\Contracts;

use ArtARTs36\ControlTime\Models\Subject;
use Illuminate\Support\Collection;

interface SubjectRepository
{
    /**
     * @return Collection|iterable<Subject>
     */
    public function all(): Collection;

    public function create(string $title, string $code, int $typeId): Subject;

    /**
     * @param array<string> $codes
     * @return Collection|iterable<Subject>
     */
    public function getByCodes(array $codes): Collection;
}
