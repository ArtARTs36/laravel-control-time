<?php

namespace Dba\ControlTime\Http\Controllers;

use Dba\ControlTime\Http\Requests\TimeStoreRequest;
use Dba\ControlTime\Http\Requests\TimeUpdateCommentRequest;
use Dba\ControlTime\Http\Requests\TimeUpdateQuantityRequest;
use Dba\ControlTime\Http\Responses\ActionResponse;
use Dba\ControlTime\Models\Time;
use Dba\ControlTime\Support\Proxy;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TimeController
 * @package Dba\ControlTime\Http\Controllers
 */
class TimeController extends BaseController
{
    public function index(int $page = 1): LengthAwarePaginator
    {
        return $this->indexShow(Proxy::getTimeBuilder(), Proxy::getTimeClass())
            ->latest('id')
            ->paginate(Proxy::getTimeIndexShowingCount(), ['*'], "TimeIndex", $page);
    }

    /**
     * @param int $id
     * @return Model
     */
    public function show(int $id): Model
    {
        return Proxy::getTimeBuilder()->find($id);
    }

    /**
     * @param TimeStoreRequest $request
     * @return Model
     */
    public function store(TimeStoreRequest $request): Model
    {
        return $this->createModel($request, Time::class);
    }

    /**
     * @param TimeStoreRequest $request
     * @param int $id
     * @return Model
     */
    public function update(TimeStoreRequest $request, int $id): Model
    {
        return $this->updateModel($request, Proxy::getTimeBuilder()->find($id));
    }

    /**
     * @param int $id
     * @return bool|mixed|null
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        return $this->deleteModel($id, Proxy::getTimeBuilder());
    }

    /**
     * @param TimeUpdateQuantityRequest $request
     * @param int $id
     * @return ActionResponse
     */
    public function updateQuantity(TimeUpdateQuantityRequest $request, int $id): ActionResponse
    {
        /** @var Time $time */
        $time = Proxy::getTimeBuilder()->find($id);
        $time->quantity = $request->get(Time::FIELD_QUANTITY);

        return new ActionResponse($time->save(), [Time::FIELD_QUANTITY => $time->quantity]);
    }

    /**
     * @param TimeUpdateCommentRequest $request
     * @param int $id
     * @return ActionResponse
     */
    public function updateComment(TimeUpdateCommentRequest $request, int $id): ActionResponse
    {
        /** @var Time $time */
        $time = Proxy::getTimeBuilder()->find($id);
        $time->comment = $request->get(Time::FIELD_COMMENT);

        return new ActionResponse($time->save(), [Time::FIELD_COMMENT => $time->comment]);
    }
}
