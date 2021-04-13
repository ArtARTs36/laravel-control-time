<?php

namespace ArtARTs36\ControlTime\Tests\Unit;

use ArtARTs36\ControlTime\Http\DataTransferObjects\CreatingTime;
use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Services\TimeCreator;
use ArtARTs36\ControlTime\Tests\TestCase;
use Illuminate\Support\Arr;

class TimeCreatorTest extends TestCase
{
    public function testInsertMany(): void
    {
        /** @var TimeCreator $creator */
        $creator = $this->app->make(TimeCreator::class);

        //

        $creator->insertMany([
            new CreatingTime($oneData = [
                'date' => '2021-01-11',
                'quantity' => 5,
                'employee_id' => 1,
                'subject_id' => 1,
            ]),
        ]);

        $time = Time::query()->first();

        self::assertNotNull($time);
        self::assertEquals($oneData, Arr::only($time->getAttributes(), array_keys($oneData)));

        //

        $creator->insertMany([
            new CreatingTime($twoData = [
                'date' => '2021-01-11',
                'quantity' => 6,
                'employee_id' => 1,
                'subject_id' => 1,
            ]),
        ]);

        $time = Time::query()->first();

        self::assertNotNull($time);
        self::assertEquals($twoData, Arr::only($time->getAttributes(), array_keys($twoData)));

        //

        $creator->insertMany([
            new CreatingTime([
                'date' => '2021-01-11',
                'quantity' => 6,
                'employee_id' => 1,
                'subject_id' => 2,
            ]),
        ]);

        self::assertEquals(2, Time::query()->count());
    }
}
