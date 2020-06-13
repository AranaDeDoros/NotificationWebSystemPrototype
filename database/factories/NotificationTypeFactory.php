<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NotificationType;
use Faker\Generator as Faker;

$factory->define(NotificationType::class, function (Faker $faker) {
    return [
        'description' => $faker->randomElement([
        						'Alert',
        						'Error',
        						'Info'
        					],$count=1)
        
    ];
});
