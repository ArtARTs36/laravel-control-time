<?php

namespace ArtARTs36\ControlTime\Http\Responses;

use Illuminate\Http\JsonResponse;

class DestroyResponse extends JsonResponse
{
    public function __construct(bool $success, $status = 200, $headers = [], $options = 0)
    {
        parent::__construct(compact('success'), $status, $headers, $options);
    }
}
