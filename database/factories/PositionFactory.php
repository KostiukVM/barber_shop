<?php


use Faker\Generator as Faker;
use App\Models\Position;


$factory->define(Position::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
    ];
});
