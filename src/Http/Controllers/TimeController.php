<?php

namespace ArtARTs36\ControlTime\Http\Controllers;

use ArtARTs36\ControlTime\Http\DataTransferObjects\CreatingTime;
use ArtARTs36\ControlTime\Http\Requests\TimeStoreRequest;
use ArtARTs36\ControlTime\Http\Requests\TimeUpdateCommentRequest;
use ArtARTs36\ControlTime\Http\Requests\TimeUpdateQuantityRequest;
use ArtARTs36\ControlTime\Http\Responses\DestroyResponse;
use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Repositories\TimeRepository;
use ArtARTs36\ControlTime\Services\TimeCreator;
use ArtARTs36\ControlTime\Services\TimeService;
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
        $time = $this->repository->findOrFail($timeId);

        return new JsonResource($creator->update(new CreatingTime($request->toArray()), $time));
    }

    /**
     * @throws \Exception
     */
    public function destroy(int $time): DestroyResponse
    {
        return new DestroyResponse($this->service->delete($this->repository->find($time)));
    }

    public function updateQuantity(TimeUpdateQuantityRequest $request, int $timeId): JsonResource
    {
        return new JsonResource($this->service->updateQuantity(
            $this->repository->find($timeId),
            $request->get(Time::FIELD_QUANTITY)
        ));
    }

    public function updateComment(TimeUpdateCommentRequest $request, int $timeId): JsonResource
    {
        return new JsonResource($this->service->updateComment(
            $this->repository->find($timeId),
            $request->get(Time::FIELD_COMMENT)
        ));
    }
}
