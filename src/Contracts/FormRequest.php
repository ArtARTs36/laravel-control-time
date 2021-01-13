<?php

namespace ArtARTs36\ControlTime\Contracts;

/**
 * Class AuthorizedRequest
 * @package ArtARTs36\ControlTime\Http\Requests
 */
abstract class FormRequest extends \Illuminate\Foundation\Http\FormRequest
{
    abstract public function rules(): array;

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
