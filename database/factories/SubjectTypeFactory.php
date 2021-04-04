<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use ArtARTs36\ControlTime\Models\SubjectType;
use Faker\Generator as Faker;

$factory->define(SubjectType::class, function (Faker $faker) {
    return [
        SubjectType::FIELD_SLUG => $faker->slug,
        SubjectType::FIELD_TITLE => $faker->word,
    ];
});
