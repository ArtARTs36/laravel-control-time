<?php

namespace Dba\ControlTime\Services;

use ArtARTs36\EmployeeInterfaces\Employee\EmployeeInterface;
use Dba\ControlTime\Models\Time;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class TimeService
{
    /**
     * Get Employee times by period
     *
     * @return \Illuminate\Database\Eloquent\Collection|Time[]
     */
    public function getByPeriod(EmployeeInterface $employee, \DateTime $start, \DateTime $end)
    {
        return Time::query()->where(Time::FIELD_EMPLOYEE_ID, $employee->getId())
            ->where(Time::FIELD_DATE, '>=', $start->format('Y-m-d'))
            ->where(Time::FIELD_DATE, '<=', $end->format('Y-m-d'))
            ->get();
    }

    /**
     * Get today Times
     *
     * @return Collection
     */
    public function today(): Collection
    {
        return Time::query()
            ->with(Time::RELATION_EMPLOYEE)
            ->where(Time::FIELD_DATE, Carbon::today())
            ->get();
    }

    public function delete(Time $time): bool
    {
        return (bool) $time->delete();
    }

    public function updateQuantity(Time $time, int $quantity): Time
    {
        $time->quantity = $quantity;
        $time->save();

        return $time;
    }

    public function updateComment(Time $time, string $comment): Time
    {
        $time->comment = $comment;
        $time->save();

        return $time;
    }
}
