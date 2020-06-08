<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Dba\ControlTime\Models\Time;
use Dba\ControlTime\Models\WorkCondition;
use Dba\ControlTime\Support\Proxy;
use Faker\Generator as Faker;

$factory->define(Proxy::getWorkConditionClass(), function (Faker $faker) {
    return [
        WorkCondition::FIELD_POSITION => $faker->text(25),
        WorkCondition::FIELD_AMOUNT_MONTH => rand(10000, 100000),
        WorkCondition::FIELD_AMOUNT_HOUR => rand(500, 1000),
        WorkCondition::FIELD_RATE => $faker->randomFloat(null, 0.1, 1),
    ];
});

