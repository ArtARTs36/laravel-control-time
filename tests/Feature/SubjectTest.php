<?php

namespace ArtARTs36\ControlTime\Tests\Feature;

use ArtARTs36\ControlTime\Models\Subject;
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
}
