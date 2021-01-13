<?php

namespace ArtARTs36\ControlTime\Http\Requests;

use ArtARTs36\ControlTime\Models\Time;
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
