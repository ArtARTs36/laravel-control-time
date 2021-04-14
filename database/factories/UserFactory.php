<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define('\ArtARTs36\ControlTime\Tests\Prototypes\User', function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
