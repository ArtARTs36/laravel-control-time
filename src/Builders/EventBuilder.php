<?php

namespace Dba\ControlTime\Builders;

use Dba\ControlTime\Events\TimeCreating;
use Dba\ControlTime\Events\TimeDeleting;
use Dba\ControlTime\Events\TimeIndexShowingEvent;
use Dba\ControlTime\Models\Time;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class EventBuilder
 * @package Dba\ControlTime\Builders
 */
final class EventBuilder
{
    /** @var array<string> */
    private const INDEX_SHOWING = [
        Time::class => TimeIndexShowingEvent::class,
    ];

    /** @var array<string> */
    private const CREATING = [
        Time::class => TimeCreating::class,
    ];

    /** @var array<string> */
    private const DELETING = [
        Time::class => TimeDeleting::class,
    ];

    /**
     * @param array $fields
     * @param Model $model
     */
    public static function creatingModel(array $fields, Model $model): void
    {
        $eventClass = static::CREATING[get_class($model)];

        event($eventClass::init($fields, $model));
    }

    /**
     * @param Model $model
     */
    public static function deletingModel(Model $model): void
    {
        $eventClass = static::DELETING[get_class($model)];

        event($eventClass::init($model));
    }

    /**
     * @param Builder $builder
     * @param string $modelClass
     */
    public static function indexShowing(Builder $builder, string $modelClass): void
    {
        $eventClass = static::INDEX_SHOWING[$modelClass];

        event($eventClass::init($builder, $eventClass));
    }
}
