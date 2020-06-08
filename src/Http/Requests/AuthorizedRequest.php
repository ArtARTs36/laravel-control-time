<?php

namespace Dba\ControlTime\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AuthorizedRequest
 * @package Dba\ControlTime\Http\Requests
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
