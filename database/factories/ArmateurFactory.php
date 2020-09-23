<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\armateur;
use Faker\Generator as Faker;

$factory->define(armateur::class, function (Faker $faker) {
    return [
        'nom' => $faker->name,
        'nationalite' => $faker->country,
//        'created_at' => Carbon::now(),
//        'updated_at' => Carbon::now(),

    ];
});
