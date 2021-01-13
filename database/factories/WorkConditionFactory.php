<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use ArtARTs36\ControlTime\Models\Time;
use ArtARTs36\ControlTime\Models\WorkCondition;
use ArtARTs36\ControlTime\Support\Proxy;
use Faker\Generator as Faker;

$factory->define(WorkCondition::class, function (Faker $faker) {
    return [
        WorkCondition::FIELD_POSITION => $faker->text(25),
        WorkCondition::FIELD_AMOUNT_MONTH => rand(10000, 100000),
        WorkCondition::FIELD_AMOUNT_HOUR => rand(500, 1000),
        WorkCondition::FIELD_RATE => $faker->randomFloat(null, 0.1, 1),
    ];
});

