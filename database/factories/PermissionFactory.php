<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Permission;
use Faker\Generator as Faker;

$factory->define(Permission::class, function (Faker $faker) {
    return [
        'description' => $faker->realText(),
        'permissionKey' => $faker->randomElement([
        						'C|R|U|D-NTF.GRP.USR',
        						'C|R|-NTF.GRP.USR'
        					],$count=1)
    ];
});
