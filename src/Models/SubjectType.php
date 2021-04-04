<?php

namespace ArtARTs36\ControlTime\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $slug
 * @property string $title
 */
class SubjectType extends Model
{
    public const FIELD_ID = 'id';
    public const FIELD_SLUG = 'slug';
    public const FIELD_TITLE = 'title';

    public $timestamps = false;

    protected $fillable = [
        self::FIELD_SLUG,
        self::FIELD_TITLE,
    ];
}
