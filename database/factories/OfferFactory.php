<?php


use Faker\Generator as Faker;
use App\Models\Offer;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->numberBetween(10, 100),
        'duration' => $faker->numberBetween(1, 10),
        'description' => $faker->sentence,
    ];
});
