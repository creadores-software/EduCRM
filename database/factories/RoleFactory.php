<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {

    return [
        'name' => $faker->unique()->realText(255),
        'guard_name' => 'web',
        'created_at' => new Carbon(),
        'updated_at' => new Carbon()
    ];
});
