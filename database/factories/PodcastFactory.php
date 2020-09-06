<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Podcast::class, function (Faker $faker) {
    return [
        'title' => $faker->text(30),
        'description' => $faker->text,
        'artwork' => $faker->imageUrl(),
    ];
});
