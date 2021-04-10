<?php

namespace ArtARTs36\ControlTime\Tests\Unit;

use ArtARTs36\ControlTime\Exceptions\SubjectNotFound;
use ArtARTs36\ControlTime\Loaders\Excel\TimeXlsxLoader;
use ArtARTs36\ControlTime\Models\Subject;
use ArtARTs36\ControlTime\Tests\TestCase;

class TimeXlsxLoaderTest extends TestCase
{
    /**
     * @covers \ArtARTs36\ControlTime\Loaders\Excel\TimeXlsxLoader::load
     */
    public function testLoad(): void
    {
        factory(Subject::class)->create([
            Subject::FIELD_CODE => 'Test',
        ]);

        $times = $this->createLoader()->load(__DIR__ . '/../mocks/times_good_01.xlsx');

        self::assertCount(2, $times);
    }

    /**
     * @covers \ArtARTs36\ControlTime\Loaders\Excel\TimeXlsxLoader::load
     */
    public function testBadSubjectNotFound(): void
    {
        self::expectException(SubjectNotFound::class);

        $this->createLoader()->load(__DIR__ . '/../mocks/times_bad_subject_not_found.xlsx');
    }

    private function createLoader(): TimeXlsxLoader
    {
        return $this->app->make(TimeXlsxLoader::class);
    }
}
