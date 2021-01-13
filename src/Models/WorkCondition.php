<?php

namespace ArtARTs36\ControlTime\Models;

use ArtARTs36\EmployeeInterfaces\Employee\EmployeeInterface;
use ArtARTs36\EmployeeInterfaces\WorkCondition\WorkConditionInterface;
use ArtARTs36\EmployeeInterfaces\WorkCondition\WorkConditionSettersAndGetters;
use ArtARTs36\ControlTime\Support\Proxy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class WorkCondition
 * @property int $id
 * @property string $position
 * @property double $rate
 * @property int $employee_id
 * @property int $amount_hour
 * @property int $amount_month
 * @property EmployeeInterface $employee
 *
 * @package ArtARTs36\ControlTime\Models
 */
class WorkCondition extends Model implements WorkConditionInterface
{
    use WorkConditionSettersAndGetters;

    const FIELD_POSITION = 'position';
    const FIELD_RATE = 'rate';
    const FIELD_EMPLOYEE_ID = 'employee_id';
    const FIELD_AMOUNT_HOUR = 'amount_hour';
    const FIELD_AMOUNT_MONTH = 'amount_month';

    protected $fillable = [
        self::FIELD_POSITION,
        self::FIELD_RATE,
        self::FIELD_EMPLOYEE_ID,
        self::FIELD_AMOUNT_HOUR,
        self::FIELD_AMOUNT_MONTH,
    ];

    protected $table = 'controltime_work_conditions';

    /**
     * @codeCoverageIgnore
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Proxy::getEmployeeClass());
    }
}
