<?php

use App\Category;
use App\User;
use App\Tags;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'slug' => $faker->slug,
        'content' => $faker->text,
        'date' => $faker->date('Y-m-d'),
        'user_id' => function () {

            return factory(User::class)->create()->id;
        },

        'category_id' => function () {

            return factory(Category::class)->create()->id;
        },
    ];
//    ;
});

$factory->afterCreating(App\Post::class, function ($post, $faker) {
    $post->tags()->save(factory(App\Tags::class)->create());
});


