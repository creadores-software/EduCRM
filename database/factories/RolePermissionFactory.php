<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\RolePermission;
use Faker\Generator as Faker;

$factory->define(RolePermission::class, function (Faker $faker) {

    return [
        'role_id' => $faker->word
    ];
});
