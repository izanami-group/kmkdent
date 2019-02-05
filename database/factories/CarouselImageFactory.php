<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CarouselImage::class, function (Faker $faker) {
    return [
        'alt' => $faker->name,
        'src' => 'carousel/test.jpg',
    ];
});
