<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\ModelPermission;
use Faker\Generator as Faker;

$factory->define(ModelPermission::class, function (Faker $faker) {

    return [
        'model_type' => $faker->word,
        'model_id' => $faker->word
    ];
});
