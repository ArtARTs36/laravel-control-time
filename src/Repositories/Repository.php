<?php

namespace ArtARTs36\ControlTime\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    abstract protected function getModelClass(): string;

    public function find(int $id): Model
    {
        return $this->newQuery()->find($id);
    }

    protected function newQuery(): Builder
    {
        return ($this->getModelClass())::query();
    }
}
