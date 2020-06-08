<?php

namespace Dba\ControlTime\Http\Requests;

use Dba\ControlTime\Models\Time;

/**
 * Class TimeStoreRequest
 * @package Dba\ControlTime\Http\Requests
 */
class TimeStoreRequest extends AuthorizedRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            Time::FIELD_DATE => 'required|string',
            Time::FIELD_QUANTITY => 'required|integer',
            Time::FIELD_EMPLOYEE_ID => 'required|integer',
            Time::FIELD_COMMENT => 'sometimes|string',
        ];
    }
}
