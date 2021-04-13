<?php

namespace ArtARTs36\ControlTime\Http\Requests;

use ArtARTs36\ControlTime\Contracts\FormRequest;

class LoadFromFileRequest extends FormRequest
{
    public const FIELD_FILE = 'file';

    public function rules(): array
    {
        return [
            static::FIELD_FILE => 'file',
        ];
    }
}
