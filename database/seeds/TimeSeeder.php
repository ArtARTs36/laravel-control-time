<?php

use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Support\Proxy;

class TimeSeeder extends \Illuminate\Database\Seeder
{
    public function run(): void
    {
        $employees = app(\ArtARTs36\ControlTime\Repositories\EmployeeRepository::class)->all();

        foreach ($employees as $employee) {
            factory(Time::class, 20)->make()->each(function (Time $time) use ($employee) {
                $time->employee_id = $employee->id;
                $time->save();
            });
        }
    }
}
