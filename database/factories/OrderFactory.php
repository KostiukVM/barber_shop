<?php


use Faker\Generator as Faker;
use App\Models\Order;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'client_id' => function () {
            return factory(Client::class)->create()->id;
        },
        'offer_id' => function () {
            return factory(Offer::class)->create()->id;
        },
        'start_time' => $faker->time(),
        'duration' => $faker->numberBetween(30, 180),
        'branch_id' => function () {
            return factory(Company::class)->create()->id;
        },
    ];
});
