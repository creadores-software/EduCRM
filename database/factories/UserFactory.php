<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    $fecha=new Carbon();
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'email_verified_at' => $fecha->format('Y-m-d'),
        'password' => $faker->password,
        'remember_token' => null,
        'active' => 1,
        'created_at' => $fecha->format('Y-m-d'),
        'updated_at' =>$fecha->format('Y-m-d')
    ];
});
