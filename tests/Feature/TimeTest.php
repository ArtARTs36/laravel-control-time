<?php

namespace ArtARTs36\ControlTime\Tests\Feature;

use ArtARTs36\ControlTime\Models\Subject;
use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class TimeTest extends TestCase
{
    use WithFaker;

    public const TIMES_COUNT = 10;

    public function setUp(): void
    {
        parent::setUp();

        $this->setUpFaker();

        $this->seed(\ControlTimeSubjectTypeSeeder::class);
        $this->seed(\ControlTimeSubjectSeeder::class);
    }

    /**
     * Get all Times
     * @covers \ArtARTs36\ControlTime\Http\Controllers\TimeController::index
     */
    public function testIndex(): void
    {
        $times = factory(Time::class, static::TIMES_COUNT)->make()
            ->each(function (Time $time) {
                $time->employee_id = $this->createEmployee()->id;
                $time->save();
            });

        $response = $this->getJson($this->route());
        $decode = $response->decodeResponseJson();

        $response->assertOk();
        static::assertArrayHasKey('data', $decode);
        static::assertNotEmpty($data = $decode['data']);
        static::assertIsArray($data);
        static::assertCount($times->count(), $data);
    }

    /**
     * Test create Time
     * @covers \ArtARTs36\ControlTime\Http\Controllers\TimeController::store
     */
    public function testStore(): void
    {
        $time = $this->makeData();

        $response = $this->postJson($this->route(), $time);

        //

        $response->assertCreated();

        $response = $response->decodeResponseJson('data');

        foreach ($time as $key => $value) {
            self::assertArrayHasKey($key, $response);
            self::assertEquals($response[$key], $value);
        }
    }

    /**
     * TEST update Time
     * @covers \ArtARTs36\ControlTime\Http\Controllers\TimeController::update
     */
    public function testUpdate(): void
    {
        $time = $this->createTime();

        $data = $this->makeData();

        $response = $this->putJson($this->route($time), $data);

        $response->assertOk();
    }

    /**
     * TEST delete Time
     * @covers \ArtARTs36\ControlTime\Http\Controllers\TimeController::destroy
     */
    public function testDestroy(): void
    {
        $time = $this->createTime();

        //

        $response = $this->deleteJson($this->route($time));
        $decode = $response->decodeResponseJson();

        //

        $response->assertOk();
        static::assertArrayHasKey('success', $decode);
        static::assertTrue($decode['success']);
        static::assertNull(Time::query()->find($time->id));
    }

    /**
     * @param Time|null $time
     * @return string
     */
    private function route(Time $time = null): string
    {
        $suffix = $time ? DIRECTORY_SEPARATOR . $time->id : "";

        return 'controltime/times' . $suffix;
    }

    /**
     * @return array
     */
    private function makeData(): array
    {
        return $this->makeTime()->toArray();
    }

    /**
     * @return Time
     */
    private function makeTime(): Time
    {
        $time = factory(Time::class)->make();
        $time->{Time::FIELD_EMPLOYEE_ID} = $this->createEmployee()->id;
        $time->{Time::FIELD_SUBJECT_ID} = Subject::query()->inRandomOrder()->first()->id;

        return $time;
    }

    /**
     * @return Time
     */
    private function createTime(): Time
    {
        $time = $this->makeTime();

        $time->save();

        return $time;
    }
}
