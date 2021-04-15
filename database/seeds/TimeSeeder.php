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
            for ($i = 0; $i < 20; $i++) {
                factory(Time::class)->create([
                    Time::FIELD_EMPLOYEE_ID => $employee->getId(),
                    Time::FIELD_SUBJECT_ID => $subjects->random()->id,
                ]);
            }
        }
    }
}
