<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;
use App\Permission;
$factory->define(Role::class, function (Faker $faker) {
    return [
        'description' => $faker->randomElement(['Admin', 'Regular']),
        'permissionId' => Permission::all()->random()->id
    ];
});
