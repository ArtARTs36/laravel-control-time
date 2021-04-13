<?php

namespace ArtARTs36\ControlTime\Http\Responses;

use Illuminate\Http\JsonResponse;

class CountResponse extends JsonResponse
{
    public function __construct(int $count, $status = 200, $headers = [], $options = 0)
    {
        parent::__construct([
            'count' => $count,
        ], $status, $headers, $options);
    }
}
