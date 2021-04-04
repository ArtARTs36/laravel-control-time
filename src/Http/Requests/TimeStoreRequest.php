<?php

namespace ArtARTs36\ControlTime\Http\Requests;

use ArtARTs36\ControlTime\Contracts\FormRequest;
use ArtARTs36\ControlTime\Models\Time;

class TimeStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            Time::FIELD_DATE => 'required|string',
            Time::FIELD_QUANTITY => 'required|integer',
            Time::FIELD_EMPLOYEE_ID => 'required|integer',
            Time::FIELD_COMMENT => 'sometimes|string',
            Time::FIELD_SUBJECT_ID => 'required|integer',
        ];
    }
}
