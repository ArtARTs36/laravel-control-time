<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Dba\ControlTime\Models\Time;
use Faker\Generator as Faker;

$factory->define(Time::class, function (Faker $faker) {
    return [
        Time::FIELD_DATE => $faker->dateTime()->format('Y-m-d'),
        Time::FIELD_QUANTITY => rand(0, Time::FULL_TIME),
        Time::FIELD_COMMENT => $faker->text(200),
    ];
});

