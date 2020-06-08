<?php

namespace Dba\ControlTime\Http\Requests;

use Dba\ControlTime\Models\Time;
use Illuminate\Foundation\Http\FormRequest;

class TimeUpdateQuantityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            Time::FIELD_QUANTITY => 'required|integer',
        ];
    }
}
