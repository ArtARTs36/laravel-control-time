<?php

namespace ArtARTs36\ControlTime\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class Repository
{
    abstract protected function getModelClass(): string;

    public function find(int $id): Model
    {
        return $this->newQuery()->find($id);
    }

    public function all(): Collection
    {
        return $this->newQuery()->get();
    }

    protected function newQuery(): Builder
    {
        return ($this->getModelClass())::query();
    }
}
