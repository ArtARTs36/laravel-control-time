<?php

namespace ArtARTs36\ControlTime\Repositories;

use ArtARTs36\ControlTime\Data\Period;
use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Support\DbUpsert;
use ArtARTs36\ControlTime\Support\Proxy;
use ArtARTs36\EmployeeInterfaces\Employee\EmployeeInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class TimeRepository extends Repository
{
    use DbUpsert;

    /**
     * @return Time|Model
     */
    public function create(array $values): Time
    {
        return $this->newQuery()->create($values);
    }

    public function existsOnDate(int $employeeId, \DateTimeInterface $date, int $subjectId): bool
    {
        return $this
            ->newQuery()
            ->where(Time::FIELD_EMPLOYEE_ID, $employeeId)
            ->whereDate(Time::FIELD_DATE, $date->format('Y-m-d'))
            ->where(Time::FIELD_SUBJECT_ID, $subjectId)
            ->exists();
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

    public function inserts(array $values): bool
    {
        return $this->newQuery()->insert($values);
    }

    /**
     * @param array<int> $employees
     * @param array<int> $subjects
     * @return Collection|iterable<Time>
     */
    public function getByPeriod(Period $period, array $employees = [], array $subjects = []): Collection
    {
        return Time::query()
            ->whereDate(Time::FIELD_DATE, '>=', $period->start)
            ->whereDate(Time::FIELD_DATE, '<=', $period->end)
            ->when(count($employees) > 0, function (Builder $query) use ($employees) {
                $query->whereIn(Time::FIELD_EMPLOYEE_ID, $employees);
            })
            ->when(count($subjects) > 0, function (Builder $query) use ($subjects) {
                $query->whereIn(Time::FIELD_SUBJECT_ID, $subjects);
            })
            ->latest()
            ->get();
    }

    protected function getModelClass(): string
    {
        return Time::class;
    }
}
