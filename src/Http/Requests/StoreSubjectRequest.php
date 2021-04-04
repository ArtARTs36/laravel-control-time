<?php

namespace ArtARTs36\ControlTime\Http\Requests;

use ArtARTs36\ControlTime\Contracts\FormRequest;
use ArtARTs36\ControlTime\Models\Subject;

class StoreSubjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            Subject::FIELD_TITLE => 'required|string',
            Subject::FIELD_CODE => 'sometimes|string|nullable',
            Subject::FIELD_TYPE_ID => 'required|int',
        ];
    }
}
