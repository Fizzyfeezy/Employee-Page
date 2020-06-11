<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employer;
use Faker\Generator as Faker;

$factory->define(Employer::class, function (Faker $faker) {
    return [
    	'user_id' => factory(App\User::class)->create()->id,
        'status' => $faker->randomElement(['test period', 'worker']),
        'salary' => $faker->numberBetween($min = 100000, $max = 1000000),
        'status_time' => $faker->randomElement(['1 months', '2 weeks', '2 months', '1 weeks', '4 months', '3 weeks']),
        'classification' => $faker->randomElement(['full time', 'part time'])
    ];
});
