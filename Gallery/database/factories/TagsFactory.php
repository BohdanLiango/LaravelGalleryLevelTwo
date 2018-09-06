<?php

use Faker\Generator as Faker;

$factory->define(App\Tags::class, function (Faker $faker) {
    return [
        'title' => $faker->word
    ];
});

