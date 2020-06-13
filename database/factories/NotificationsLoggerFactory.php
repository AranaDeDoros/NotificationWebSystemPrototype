<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NotificationsLogger;
use Faker\Generator as Faker;
use App\User;

$factory->define(NotificationsLogger::class, function (Faker $faker) {
    return [
        'registered_by' => User::all()->random()->id,
        'message' => $faker->randomElement([
        						'created a notification',
        						'registered a user',
        						'created a group',
        						'deleted a notification',
        						'deleted an user',
        						'deleted a group',
        						'was sent an email',
        						'was sent an alert',
        						'was sent an error'
        					]),
        'eventType' => $faker->randomNumber(1, $strict=true)
    ];
});
