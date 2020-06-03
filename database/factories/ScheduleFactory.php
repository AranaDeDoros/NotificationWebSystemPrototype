<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Schedule;
use Faker\Generator as Faker;

$factory->define(Schedule::class, function (Faker $faker) {
    return [
        'description' => $faker->realText(),
        'lengthInDays' => $faker->randomNumber(1, $strict=true),
        
    ];
});
