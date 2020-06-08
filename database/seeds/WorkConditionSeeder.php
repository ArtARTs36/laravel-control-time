<?php

use Dba\ControlTime\Models\WorkCondition;
use Dba\ControlTime\Support\Proxy;
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
