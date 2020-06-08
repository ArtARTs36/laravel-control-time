<?php

namespace Dba\ControlTime\Http\Controllers;

use Dba\ControlTime\Builders\EventBuilder;
use Dba\ControlTime\Http\Responses\ActionResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Controller as LaravelController;

class BaseController extends LaravelController
{
    const PERMISSIONS = [];

    protected function updateModel(FormRequest $request, Model $model): Model
    {
        $allowInsertFields = $model->getFillable();
        $fields = $request->only($allowInsertFields);

        $model->update($fields);

        return $model;
    }

    /**
     * @param FormRequest $request
     * @param string $modelClass
     * @param bool $save
     * @return Model
     */
    protected function createModel(FormRequest $request, string $modelClass, bool $save = true): Model
    {
        /** @var Model $model */
        $model = new $modelClass();

        $allowInsertFields = $model->getFillable();
        $fields = $request->only($allowInsertFields);

        EventBuilder::creatingModel($fields, $model);

        $model->fill($fields);

        ($save === true) && $model->save();

        return $model;
    }

    /**
     * @param int $id
     * @param Builder $builder
     * @return ActionResponse
     * @throws \Exception
     */
    protected function deleteModel(int $id, Builder $builder)
    {
        $model = $builder->find($id);

        EventBuilder::deletingModel($model);

        return new ActionResponse($model->delete());
    }

    /**
     * @param Builder $builder
     * @param string $modelClass
     * @return Builder
     */
    protected function indexShow(Builder $builder, string $modelClass): Builder
    {
        EventBuilder::indexShowing($builder, $modelClass);

        return $builder;
    }
}
