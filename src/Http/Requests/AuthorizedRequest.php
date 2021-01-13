<?php

namespace ArtARTs36\ControlTime\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AuthorizedRequest
 * @package ArtARTs36\ControlTime\Http\Requests
 */
abstract class AuthorizedRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
