<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use ArtARTs36\ControlTime\Models\Subject;
use ArtARTs36\ControlTime\Models\SubjectType;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    return [
        Subject::FIELD_CODE => $faker->slug,
        Subject::FIELD_TITLE => $faker->word,
        Subject::FIELD_TYPE_ID => factory(SubjectType::class)->create()->id,
    ];
});
