<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NotificationsLogger;
use Faker\Generator as Faker;
use App\User;

$factory->define(NotificationsLogger::class, function (Faker $faker) {
    return [
        'registered_by' => User::all()->random()->id,
        'message' => $faker->realText(),
        'eventType' => $faker->randomNumber(1, $strict=true)
    ];
});
