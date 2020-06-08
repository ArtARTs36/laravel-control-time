<?php

namespace Dba\ControlTime\Http\Responses;

use Illuminate\Http\JsonResponse;

class ActionResponse extends JsonResponse
{
    public function __construct($success, $data = null, $status = null)
    {
        $array = [
            'success' => $success,
            'data' => $data
        ];

        parent::__construct($array, $status ?? 200, [], 0);
    }
}
