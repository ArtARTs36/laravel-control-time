<?php

namespace Dba\ControlTime\Tests;

use App\Models\Employee\Employee;
use Carbon\Carbon;
use Dba\ControlTime\Models\Time;
use Dba\ControlTime\Models\WorkCondition;
use Dba\ControlTime\Support\Proxy;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class TimeTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public const TIMES_COUNT = 10;

    public function setUp(): void
    {
        parent::setUp();

        $this->setUpFaker();
    }

    /**
     * Get all Times
     */
    public function testIndex(): void
    {
        Proxy::getTimeBuilder()->truncate();

        $times = factory(Proxy::getTimeClass(), static::TIMES_COUNT)->make()
            ->each(function (Time $time) {
                $time->employee_id = factory(Proxy::getEmployeeClass())->create()->id;
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
     */
    public function testStore(): void
    {
        $time = $this->makeData();

        $response = $this->postJson($this->route(), $time);

        //

        $response->assertCreated();

        $response = $response->decodeResponseJson();

        foreach ($time as $key => $value) {
            self::assertArrayHasKey($key, $response);
            self::assertEquals($response[$key], $value);
        }
    }

    /**
     * TEST update Time
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
    }

    /**
     * @param Time|null $time
     * @return string
     */
    private function route(Time $time = null): string
    {
        $suffix = $time ? DIRECTORY_SEPARATOR . $time->id : "";

        return Proxy::apiPath('times' . $suffix);
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
        $time = factory(Proxy::getTimeClass())->make();
        $time->{Time::FIELD_EMPLOYEE_ID} = factory(Proxy::getEmployeeClass())->create()->id;

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
