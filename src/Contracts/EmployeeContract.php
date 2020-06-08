<?php

namespace Dba\ControlTime\Contracts;

use Dba\ControlTime\Models\WorkCondition;
use Dba\ControlTime\Support\Proxy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * EmployeeContract
 * @package Dba\ControlTime\Contract
 */
abstract class EmployeeContract extends Model
{
    public const RELATION_WORK_CONDITIONS = 'workConditions';

    /** @var WorkCondition */
    public $currentWorkCondition;

    /**
     * Time constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = Proxy::getEmployeeTable();
    }

    /**
     * Get Employee id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

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
     * @return WorkCondition
     */
    public function getCurrentWorkConditions(): WorkCondition
    {
        if ($this->currentWorkCondition === null) {
            $this->currentWorkCondition = $this->workConditions()->latest()->first();
        }

        return $this->currentWorkCondition;
    }
}
