<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Dba\ControlTime\Models\Time;
use Dba\ControlTime\Support\Proxy;
use Faker\Generator as Faker;

$factory->define(Proxy::getTimeClass(), function (Faker $faker) {
    return [
        Time::FIELD_DATE => $faker->dateTime()->format(Proxy::getTimeFormat()),
        Time::FIELD_QUANTITY => rand(0, Time::FULL_TIME),
        Time::FIELD_COMMENT => $faker->text(200),
    ];
});

