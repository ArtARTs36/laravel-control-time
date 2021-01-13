<?php

namespace ArtARTs36\ControlTime\Traits;

use ArtARTs36\EmployeeInterfaces\WorkCondition\WorkConditionInterface;
use ArtARTs36\ControlTime\Models\WorkCondition;
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
        return $this->hasMany(WorkCondition::class);
    }

    /**
     * Work Condition
     *
     * @return HasOne
     */
    public function workCondition(): HasOne
    {
        return $this->hasOne(WorkCondition::class, 'employee_id');
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
