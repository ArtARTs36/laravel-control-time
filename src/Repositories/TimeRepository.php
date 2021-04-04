<?php

namespace ArtARTs36\ControlTime\Repositories;

use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Support\Proxy;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class TimeRepository extends Repository
{
    /**
     * @return Time|Model
     */
    public function create(array $values): Time
    {
        return $this->newQuery()->create($values);
    }

    public function paginate(int $page): LengthAwarePaginator
    {
        return $this
            ->newQuery()
            ->latest('id')
            ->paginate(
                config('controltime.time.index_showing.page_count', 10),
                ['*'],
                'TimeIndex',
                $page
            );
    }

    protected function getModelClass(): string
    {
        return Time::class;
    }
}
