<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Group;
use Faker\Generator as Faker;
use App\GroupType;

$factory->define(Group::class, function (Faker $faker) {
    return [
    	'groupName' => $faker->name(),
    	'status' => $faker->boolean($chanceOfGettingTrue = 50),
    	'groupType' => GroupType::all()->random()->id
          
    ];
});
