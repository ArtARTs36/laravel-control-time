<?php

namespace Dba\ControlTime\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as LaravelController;

class BaseController extends LaravelController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const PERMISSIONS = [];

    protected function updateModel(FormRequest $request, Model $model): Model
    {
        $allowInsertFields = $model->getFillable();
        $fields = $request->only($allowInsertFields);

        $model->update($fields);

        return $model;
    }
}
