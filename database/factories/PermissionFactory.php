<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Permission;
use Faker\Generator as Faker;

$factory->define(Permission::class, function (Faker $faker) {
    return [
        'description' => $faker->randomElement([
        						'create_user', 'edit_user', 'delete_user',
        						'create_group', 'edit_group', 'delete_group',
        						'create_notification', 'edit_notification', 'delete_notification'
        					]),
        'permissionKey' => $faker->randomElement([
        						'C|R|U|D-NTF.GRP.USR',
        						'C|R|-NTF.GRP.USR'
        					],$count=1)
    ];
});
