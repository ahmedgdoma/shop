<?php

use Faker\Generator as Faker;

$factory->define(App\Size::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'product_id'=>$faker->numberBetween($min = 1, $max = 100)
    ];
});
