<?php

namespace ArtARTs36\ControlTime\Http\Requests;

use ArtARTs36\ControlTime\Contracts\FormRequest;
use ArtARTs36\ControlTime\Models\Time;

class TimeUpdateQuantityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            Time::FIELD_QUANTITY => 'required|integer',
        ];
    }
}
