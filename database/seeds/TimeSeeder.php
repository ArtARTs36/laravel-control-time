<?php

use ArtARTs36\ControlTime\Contracts\SubjectRepository;
use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Repositories\EmployeeRepository;
use Illuminate\Support\Collection;

class TimeSeeder extends \Illuminate\Database\Seeder
{
    public function run(): void
    {
        /** @var \ArtARTs36\EmployeeInterfaces\Employee\EmployeeInterface[] $employees */
        $employees = app(EmployeeRepository::class)->all();

        /** @var Collection|\ArtARTs36\ControlTime\Models\Subject[] $subjects */
        $subjects = app(SubjectRepository::class)->all();

        foreach ($employees as $employee) {
            for ($i = 1; $i < 20; $i++) {
                foreach ($subjects as $subject) {
                    factory(Time::class)->create([
                        Time::FIELD_EMPLOYEE_ID => $employee->getId(),
                        Time::FIELD_SUBJECT_ID => $subject->id,
                        Time::FIELD_DATE => \Carbon\Carbon::parse("+ $i ago"),
                    ]);
                }
            }
        }
    }
}
