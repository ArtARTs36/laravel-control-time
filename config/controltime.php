<?php

return [
    'employee' => [
        'model_class' => '\Dba\ControlTime\Tests\Prototypes\User',
        'table' => 'controltime_employee',
    ],
    'work_condition' => [
        'model_class' => '\Dba\ControlTime\Models\WorkCondition',
    ],
    'time' => [
        'model_class' => '\Dba\ControlTime\Models\Time',
        'table' => 'controltime_times',
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
