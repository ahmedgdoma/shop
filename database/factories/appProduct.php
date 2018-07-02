<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'price'=>$faker->numberBetween($min = 1, $max = 9000),
        'category_id'=>$faker->numberBetween($min = 1, $max = 15),
        'store_id'=>$faker->numberBetween($min = 1, $max = 10)
    ];
});
