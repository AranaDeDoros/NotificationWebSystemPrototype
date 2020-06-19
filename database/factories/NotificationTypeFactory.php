<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NotificationType;
use Faker\Generator as Faker;

$factory->define(NotificationType::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement([
        						'Alert',
        						'Error',
        						'Info'
        					],$count=1),
    	'description'   => $faker->randomElement([
    							'A network error',
    							'A generic alert'
    						]),
        'emailTemplate' => $faker->randomElement([
                                'mail.alert',
                                'mail.error',
                                'mail.info'
                            ],$count=1)
        
    ];
});
