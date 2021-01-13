<?php

return [
    'employee' => [
        'model_class' => '\ArtARTs36\ControlTime\Tests\Prototypes\User',
        'table' => 'controltime_employee',
    ],
    'time' => [
        'model_class' => '\ArtARTs36\ControlTime\Models\Time',
        'date_format' => 'Y-m-d',
        'index_showing' => [
            'page_count' => 10,
        ],
    ],
    'routes' => [
        'api' => [
            'middleware' => [],
            'prefix' => 'controltime',
        ],
    ],
];
