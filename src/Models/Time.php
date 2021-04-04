<?php

namespace ArtARTs36\ControlTime\Models;

use ArtARTs36\ControlTime\Support\Proxy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $date
 * @property int $quantity
 * @property int $employee_id
 * @property string $comment
 * @property int $subject_id
 * @property Subject $subject
 */
class Time extends Model
{
    public const FIELD_DATE = 'date';
    public const FIELD_EMPLOYEE_ID = 'employee_id';
    public const FIELD_QUANTITY = 'quantity';
    public const FIELD_COMMENT = 'comment';

    public const FULL_TIME = 8 * 60;

    public const RELATION_EMPLOYEE = 'employee';
    public const FIELD_SUBJECT_ID = 'subject_id';

    protected $fillable = [
        self::FIELD_DATE,
        self::FIELD_EMPLOYEE_ID,
        self::FIELD_QUANTITY,
        self::FIELD_COMMENT,
        self::FIELD_SUBJECT_ID,
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
     * @codeCoverageIgnore
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(config('controltime.employee.model_class'));
    }

    /**
     * @codeCoverageIgnore
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function getHours(): int
    {
        return (int) ($this->quantity / 60);
    }
}
