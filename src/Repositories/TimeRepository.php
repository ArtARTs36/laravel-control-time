<?php

namespace ArtARTs36\ControlTime\Repositories;

use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Support\Proxy;
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
