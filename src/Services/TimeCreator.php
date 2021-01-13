<?php

namespace ArtARTs36\ControlTime\Services;

use ArtARTs36\ControlTime\Http\DataTransferObjects\CreatingTime;
use ArtARTs36\ControlTime\Http\Requests\TimeStoreRequest;
use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Repositories\TimeRepository;

class TimeCreator
{
    protected $repository;

    public function __construct(TimeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(CreatingTime $data): Time
    {
        return $this->repository->create($data->toArray());
    }

    public function update(CreatingTime $data, Time $time): Time
    {
        $time->update($data->toArray());

        return $time;
    }
}
