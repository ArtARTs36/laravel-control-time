<?php

namespace Dba\ControlTime\Services;

use ArtARTs36\EmployeeInterfaces\Employee\EmployeeInterface;
use Dba\ControlTime\Models\Time;
use Dba\ControlTime\Support\Proxy;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * Class TimeService
 * @package Dba\ControlTime\Services
 */
class TimeService
{
    /**
     * Get Employee times by period
     *
     * @param EmployeeInterface $employee
     * @param \DateTime $start
     * @param \DateTime $end
     * @return \Illuminate\Database\Eloquent\Collection|Time[]
     */
    public static function getByPeriod(EmployeeInterface $employee, \DateTime $start, \DateTime $end)
    {
        return Time::query()->where(Time::FIELD_EMPLOYEE_ID, $employee->getId())
            ->where(Time::FIELD_DATE, '>=', $start->format(Proxy::getTimeFormat()))
            ->where(Time::FIELD_DATE, '<=', $end->format(Proxy::getTimeFormat()))
            ->get();
    }

    /**
     * Get today Times
     *
     * @return Collection
     */
    public static function today(): Collection
    {
        return Time::query()->with(Time::RELATION_EMPLOYEE)
            ->where(Time::FIELD_DATE, Carbon::today()->format(Proxy::getTimeFormat()))
            ->get();
    }
}
