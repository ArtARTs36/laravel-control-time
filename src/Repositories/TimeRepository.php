<?php

namespace Dba\ControlTime\Repositories;

use Dba\ControlTime\Models\Time;
use Dba\ControlTime\Support\Proxy;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TimeRepository extends Repository
{
    public function create(array $values): Time
    {
        return $this->newQuery()->create($values);
    }

    public function paginate(int $page): LengthAwarePaginator
    {
        return $this
            ->newQuery()
            ->latest('id')
            ->paginate(Proxy::getTimeIndexShowingCount(), ['*'], 'TimeIndex', $page);
    }

    protected function getModelClass(): string
    {
        return Time::class;
    }
}
