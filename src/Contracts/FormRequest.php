<?php

namespace ArtARTs36\ControlTime\Contracts;

abstract class FormRequest extends \Illuminate\Foundation\Http\FormRequest
{
    abstract public function rules(): array;

    public function authorize(): bool
    {
        return true;
    }
}
