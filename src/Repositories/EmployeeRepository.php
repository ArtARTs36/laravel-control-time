<?php

namespace ArtARTs36\ControlTime\Repositories;

class EmployeeRepository extends Repository
{
    protected function getModelClass(): string
    {
        return config('controltime.employee.model_class');
    }
}
