<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\jbxx::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'tel' => $faker->phoneNumber,
        'IDCard' => str_random(18),
        'sex' => $faker->randomElement(['男', '女']),
        'jklb' => $faker->title,
        'addr' => $faker->sentence
    ];
});
