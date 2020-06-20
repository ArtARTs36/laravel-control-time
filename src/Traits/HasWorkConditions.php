<?php

namespace Dba\ControlTime\Traits;

use ArtARTs36\EmployeeInterfaces\WorkCondition\WorkConditionInterface;
use Dba\ControlTime\Support\Proxy;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasWorkConditions
{
    private $currentWorkCondition;

    /**
     * Get Work Conditions
     *
     * @return HasMany
     */
    public function workConditions(): HasMany
    {
        return $this->hasMany(Proxy::getWorkConditionClass());
    }

    /**
     * Work Condition
     *
     * @return HasOne
     */
    public function workCondition(): HasOne
    {
        return $this->hasOne(Proxy::getWorkConditionClass(), 'employee_id');
    }

    /**
     * Get current Work Conditions
     *
     * @return WorkConditionInterface
     */
    public function getCurrentWorkCondition(): ?WorkConditionInterface
    {
        if ($this->currentWorkCondition === null) {
            $this->currentWorkCondition = $this->workConditions()->latest()->first();
        }

        return $this->currentWorkCondition;
    }
}
