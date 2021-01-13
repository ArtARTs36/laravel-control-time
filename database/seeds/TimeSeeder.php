<?php

use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Support\Proxy;

class TimeSeeder extends \Illuminate\Database\Seeder
{
    public function run(): void
    {
        $employees = Proxy::getEmployeeBuilder()->get();

        foreach ($employees as $employee) {
            factory(Time::class, 20)->make()->each(function (Time $time) use ($employee) {
                $time->employee_id = $employee->id;
                $time->save();
            });
        }
    }
}
