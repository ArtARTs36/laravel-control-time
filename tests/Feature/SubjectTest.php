<?php

namespace ArtARTs36\ControlTime\Tests\Feature;

use ArtARTs36\ControlTime\Models\Subject;
use ArtARTs36\ControlTime\Models\SubjectType;
use ArtARTs36\ControlTime\Tests\TestCase;

class SubjectTest extends TestCase
{
    /**
     * @covers \ArtARTs36\ControlTime\Http\Controllers\SubjectController::index
     */
    public function testIndex(): void
    {
        $this->getJson('controltime/subjects')->assertOk()->assertExactJson([
            'data' => [],
        ]);

        //

        factory(Subject::class, 2)->create();

        $this->getJson('controltime/subjects')->assertOk()->assertJsonCount(2, 'data');
    }

    /**
     * @covers \ArtARTs36\ControlTime\Http\Controllers\SubjectController::store
     */
    public function testStore(): void
    {
        /** @var SubjectType $type */
        $type = factory(SubjectType::class)->create();

        //

        $this
            ->postJson('controltime/subjects', [
                Subject::FIELD_TYPE_ID => $type->id,
                Subject::FIELD_TITLE => 'test',
            ])
            ->assertCreated()
            ->assertJson([
                'data' => [
                    Subject::FIELD_TITLE => 'test',
                    Subject::FIELD_TYPE_ID => $type->id,
                    Subject::FIELD_CODE => $type->title . '_test_' . date('Y_m'),
                ],
            ]);
    }
}
