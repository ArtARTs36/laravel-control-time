<?php

namespace ArtARTs36\ControlTime\Tests\Feature;

use ArtARTs36\ControlTime\Models\SubjectType;
use ArtARTs36\ControlTime\Tests\TestCase;

class SubjectTypeTest extends TestCase
{
    /**
     * @covers \ArtARTs36\ControlTime\Http\Controllers\SubjectTypeController::index
     */
    public function testIndex(): void
    {
        $this->getJson('controltime/subject-types')->assertOk()->assertExactJson([
            'data' => [],
        ]);

        //

        factory(SubjectType::class, 2)->create();

        $this->getJson('controltime/subject-types')->assertOk()->assertJsonCount(2, 'data');
    }
}
