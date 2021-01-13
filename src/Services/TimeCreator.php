<?php

namespace Dba\ControlTime\Services;

use Dba\ControlTime\Http\DataTransferObjects\CreatingTime;
use Dba\ControlTime\Http\Requests\TimeStoreRequest;
use Dba\ControlTime\Models\Time;
use Dba\ControlTime\Repositories\TimeRepository;

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
