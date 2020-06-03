<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notification;
use Faker\Generator as Faker;
use App\Group;
use App\Schedule;
use App\NotificationType;

$factory->define(Notification::class, function (Faker $faker) {
    return [
        'notificationType'=> rand(1, NotificationType::all()->count()),
        'groupId'=> rand(1, Group::all()->count()),
        'notificationStatus'=> $faker->boolean(),
        'scheduleType'=> rand(1, Schedule::all()->count()),
        'attachments'=>$faker->boolean()
    ];
});
