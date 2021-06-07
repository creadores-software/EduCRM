<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\ModelRole;
use Faker\Generator as Faker;

$factory->define(ModelRole::class, function (Faker $faker) {

    return [
        'model_type' => $faker->word,
        'model_id' => $faker->word
    ];
});
