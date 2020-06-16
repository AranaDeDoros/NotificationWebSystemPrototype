<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NotificationType;
use Faker\Generator as Faker;

$factory->define(NotificationType::class, function (Faker $faker) {
    return [
    	'type' 		  => $faker->randomElement([
    							'A network error',
    							'A generic alert'
    						]),
        'description' => $faker->randomElement([
        						'Alert',
        						'Error',
        						'Info'
        					],$count=1),
        'emailTemplate' => $faker->randomElement([
                                'mail.alert',
                                'mail.error',
                                'mail.info'
                            ],$count=1)
        
    ];
});
