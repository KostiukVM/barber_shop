<?php


use Faker\Generator as Faker;
use App\Models\Company;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'address' => $faker->address,
    ];
});
