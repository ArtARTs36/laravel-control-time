<?php

namespace ArtARTs36\ControlTime\Http\Requests;

use ArtARTs36\ControlTime\Contracts\FormRequest;
use ArtARTs36\ControlTime\Data\Period;
use ArtARTs36\ControlTime\Reports\Data\ReportFilter;
use Carbon\Carbon;

class ReportBuildRequest extends FormRequest
{
    public const FIELD_EMPLOYEES = 'employees';
    public const FIELD_SUBJECTS = 'subjects';
    public const FIELD_DATE_START = 'date_start';
    public const FIELD_DATE_END = 'date_end';

    public function rules(): array
    {
        return [
            static::FIELD_EMPLOYEES => 'sometimes|array',
            static::FIELD_EMPLOYEES . '.*' => 'required|integer',

            static::FIELD_SUBJECTS => 'sometimes|array',
            static::FIELD_SUBJECTS . '.*' => 'required|integer',

            static::FIELD_DATE_START => 'string|required',
            static::FIELD_DATE_END => 'string|required',
        ];
    }

    public function toReportFilter(): ReportFilter
    {
        return new ReportFilter(
            array_map('intval', $this->input(static::FIELD_EMPLOYEES, [])),
            array_map('intval', $this->input(static::FIELD_SUBJECTS, [])),
            new Period(
                Carbon::parse($this->input(static::FIELD_DATE_START)),
                Carbon::parse($this->input(static::FIELD_DATE_END))
            )
        );
    }
}
