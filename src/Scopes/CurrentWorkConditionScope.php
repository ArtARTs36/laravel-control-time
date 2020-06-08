<?php

namespace Dba\ControlTime\Scopes;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CurrentWorkConditionScope implements Scope
{
    const NAME = 'currentWorkConditionScope';

    /**
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->with(['workCondition' => function (HasOne $query) {
            $query->latest()->take(1);
        }]);
    }
}
