<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Player;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'second_name' => $faker->lastName,
        'form' => randDecimal(1, 5),
        'total_points' => randDecimal(10, 50),
        'influence' => randDecimal(100, 200),
        'creativity' => randDecimal(10, 50),
        'threat' => randDecimal(100, 200),
        'ict_index' => randDecimal(10, 50)
    ];
});

function randDecimal($min, $max){
    return mt_rand($min*10, $max*10) / 10;
}