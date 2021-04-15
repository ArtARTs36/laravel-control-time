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

        $request(Carbon::now(), Carbon::now())->assertOk();
    }
}
