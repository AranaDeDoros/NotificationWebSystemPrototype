<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
    	'groupName' => $faker->name(),
    	'status' => $faker->randomNumber(1, $strict=true),
    	'groupType' => $faker->randomNumber(1, $strict=true)
          
    ];
});
