<?php

namespace Dba\ControlTime\Http\Controllers;

use Dba\ControlTime\Http\DataTransferObjects\CreatingTime;
use Dba\ControlTime\Http\Requests\TimeStoreRequest;
use Dba\ControlTime\Http\Requests\TimeUpdateCommentRequest;
use Dba\ControlTime\Http\Requests\TimeUpdateQuantityRequest;
use Dba\ControlTime\Http\Responses\DestroyResponse;
use Dba\ControlTime\Models\Time;
use Dba\ControlTime\Repositories\TimeRepository;
use Dba\ControlTime\Services\TimeCreator;
use Dba\ControlTime\Services\TimeService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\JsonResource;

class TimeController extends BaseController
{
    protected $service;

    protected $repository;

    public function __construct(TimeService $service, TimeRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    public function index(TimeRepository $repository, int $page = 1): LengthAwarePaginator
    {
        return $repository->paginate($page);
    }

    public function show(Time $time): JsonResource
    {
        return new JsonResource($time);
    }

    public function store(TimeStoreRequest $request, TimeCreator $creator): JsonResource
    {
        return new JsonResource($creator->create(new CreatingTime($request->toArray())));
    }

    public function update(int $timeId, TimeStoreRequest $request, TimeCreator $creator): JsonResource
    {
        /** @var Time $time */
        $time = $this->repository->find($timeId);

        return new JsonResource($creator->update(new CreatingTime($request->toArray()), $time));
    }

    /**
     * @throws \Exception
     */
    public function destroy(int $time): DestroyResponse
    {
        return new DestroyResponse($this->service->delete($this->repository->find($time)));
    }

    public function updateQuantity(TimeUpdateQuantityRequest $request, Time $time): JsonResource
    {
        return new JsonResource($this->service->updateQuantity($time, $request->get(Time::FIELD_QUANTITY)));
    }

    public function updateComment(TimeUpdateCommentRequest $request, Time $time): JsonResource
    {
        return new JsonResource($this->service->updateComment($time, $request->get(Time::FIELD_COMMENT)));
    }
}
