<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GroupType;
use Faker\Generator as Faker;

$factory->define(GroupType::class, function (Faker $faker) {
    return [
        'description'=> $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});
