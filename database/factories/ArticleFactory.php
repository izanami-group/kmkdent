<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraphs(4, true),
        'title' => $faker->sentence(),
    ];
});
