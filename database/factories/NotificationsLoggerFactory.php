<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NotificationsLogger;
use Faker\Generator as Faker;

$factory->define(NotificationsLogger::class, function (Faker $faker) {
    return [
        'registered_by' => $faker->randomNumber(1, $strict=true),
        'message' => $faker->realText(),
        'eventType' => $faker->randomNumber(1, $strict=true)
    ];
});
