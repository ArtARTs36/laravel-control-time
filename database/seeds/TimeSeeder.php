<?php

use ArtARTs36\ControlTime\Contracts\SubjectRepository;
use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Repositories\EmployeeRepository;
use ArtARTs36\ControlTime\Support\Proxy;

class TimeSeeder extends \Illuminate\Database\Seeder
{
    public function run(): void
    {
        $employees = app(EmployeeRepository::class)->all();
        $subjects = app(SubjectRepository::class)->all();

        foreach ($employees as $employee) {
            factory(Time::class, 20)->make()->each(function (Time $time) use ($employee, $subjects) {
                $time->employee_id = $employee->id;
                $time->subject_id = $subjects->random()->id;
                $time->save();
            });
        }
    }
}
