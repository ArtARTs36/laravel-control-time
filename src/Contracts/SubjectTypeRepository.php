<?php

namespace ArtARTs36\ControlTime\Contracts;

use ArtARTs36\ControlTime\Models\SubjectType;
use Illuminate\Support\Collection;

interface SubjectTypeRepository
{
    /**
     * @return Collection|iterable<SubjectType>
     */
    public function all(): Collection;
}
