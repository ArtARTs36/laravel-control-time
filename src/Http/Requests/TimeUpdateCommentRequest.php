<?php

namespace Dba\ControlTime\Http\Requests;

use Dba\ControlTime\Models\Time;
use Illuminate\Foundation\Http\FormRequest;

class TimeUpdateCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            Time::FIELD_COMMENT => 'required|string',
        ];
    }
}
