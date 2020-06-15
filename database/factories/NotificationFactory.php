<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notification;
use Faker\Generator as Faker;
use App\Group;
use App\Schedule;
use App\NotificationType;

$factory->define(Notification::class, function (Faker $faker) {
    return [
        'notificationTypeId'=> NotificationType::all()->random()->id,
        'groupId'=> Group::all()->random()->id,
        'notificationStatus'=> $faker->boolean(),
        'scheduleTypeId'=> Schedule::all()->random()->id,
        'attachments'=>$faker->boolean(),
        'customMessage' => $faker->realText()
    ];
});
