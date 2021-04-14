<?php

namespace ArtARTs36\ControlTime\Tests\Feature;

use ArtARTs36\ControlTime\Tests\TestCase;
use Carbon\Carbon;

class TimeReportPeriodTest extends TestCase
{
    /**
     * @covers \ArtARTs36\ControlTime\Http\Controllers\TimeReportController::report
     * @covers \ArtARTs36\ControlTime\Reports\Target\Period\CsvPeriodReport::make
     */
    public function test(): void
    {
        $request = function (\DateTimeInterface $start, \DateTimeInterface $end) {
            return $this
                ->getJson(
                    'controltime/times/reports/period/csv/'
                    . '?date_start=' . $start->format('Y-m-d H:i:s')
                    . '&date_end=' . $end->format('Y-m-d H:i:s')
                );
        };

        $hash = '6b10dc93c7ace9671534645bbb3ee9c9';

        $request(Carbon::now(), Carbon::now());

        self::assertTrue($request(Carbon::now(), Carbon::now())
            ->assertOk()
            ->baseResponse
            ->headers->contains('content-disposition', 'attachment; filename='. $hash));
    }
}
