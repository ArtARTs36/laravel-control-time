<?php

namespace ArtARTs36\ControlTime\Services;

use ArtARTs36\ControlTime\Contracts\TimeFileLoader;
use ArtARTs36\ControlTime\Exceptions\TimeAlreadyExists;
use ArtARTs36\ControlTime\Http\DataTransferObjects\CreatingTime;
use ArtARTs36\ControlTime\Http\Requests\TimeStoreRequest;
use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Repositories\TimeRepository;

class TimeCreator
{
    protected $repository;

    /**
     * @codeCoverageIgnore
     */
    public function __construct(TimeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function fromFile(TimeFileLoader $loader, string $path): bool
    {
        return $this->insertMany($loader->load($path));
    }

    /**
     * @param array<CreatingTime> $timesData
     * @return bool
     */
    protected function insertMany(array $timesData): bool
    {
        $inserts = [];

        foreach ($timesData as $time) {
            $inserts[] = [
                Time::FIELD_SUBJECT_ID => $time->subject_id,
                Time::FIELD_DATE => $time->date,
                Time::FIELD_EMPLOYEE_ID => $time->employee_id,
                Time::FIELD_COMMENT => $time->comment,
                Time::FIELD_QUANTITY => $time->quantity,
            ];
        }

        return $this->repository->inserts($inserts);
    }

    public function create(CreatingTime $data): Time
    {
        if ($this->repository->existsOnDate($data->employee_id, $data->getDate(), $data->subject_id)) {
            throw new TimeAlreadyExists($data);
        }

        return $this->repository->create($data->toArray());
    }

    public function update(CreatingTime $data, Time $time): Time
    {
        $time->update($data->toArray());

        return $time;
    }
}
