<?php

use ArtARTs36\ControlTime\Models\WorkCondition;
use ArtARTs36\ControlTime\Support\Proxy;
use Illuminate\Database\Seeder;

class WorkConditionSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Proxy::getEmployeeBuilder()->get();

        foreach ($employees as $employee) {
            /** @var WorkCondition $condition */
            $condition = factory(WorkCondition::class)->make();
            $condition->employee_id = $employee->id;

            $condition->save();
        }
    }
}
