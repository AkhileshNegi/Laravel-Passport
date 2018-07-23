<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
      'name'  => $faker->text(7),
      'email' => $faker->unique()->safeEmail,
      'number' => $faker->phoneNumber,
    ];
});
