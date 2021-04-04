<?php

namespace ArtARTs36\ControlTime\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $title
 * @property string $code
 * @property int $type_id
 * @property SubjectType $type
 */
class Subject extends Model
{
    public const FIELD_ID = 'id';
    public const FIELD_TITLE = 'title';
    public const FIELD_CODE = 'code';
    public const FIELD_TYPE_ID = 'type_id';

    protected $fillable = [
        self::FIELD_TITLE,
        self::FIELD_CODE,
        self::FIELD_TYPE_ID,
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(SubjectType::class);
    }
}
