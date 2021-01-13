<?php

namespace ArtARTs36\ControlTime\Models;

use ArtARTs36\ControlTime\Support\Proxy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Time
 * @property int $id
 * @property int $date
 * @property int $quantity
 * @property int $employee_id
 * @property string $comment
 *
 * @package ArtARTs36\ControlTime\Models
 */
class Time extends Model
{
    public const FIELD_DATE = 'date';
    public const FIELD_EMPLOYEE_ID = 'employee_id';
    public const FIELD_QUANTITY = 'quantity';
    public const FIELD_COMMENT = 'comment';

    public const FULL_TIME = 8 * 60;

    public const RELATION_EMPLOYEE = 'employee';

    protected $fillable = [
        self::FIELD_DATE,
        self::FIELD_EMPLOYEE_ID,
        self::FIELD_QUANTITY,
        self::FIELD_COMMENT,
    ];

    protected $table = 'controltime_times';

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(static::RELATION_EMPLOYEE, function (Builder $builder) {
            $builder->with(static::RELATION_EMPLOYEE);
        });
    }

    /**
     * @return BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Proxy::getEmployeeClass());
    }

    /**
     * @return int
     */
    public function getHours(): int
    {
        return (int) ($this->quantity / 60);
    }
}
