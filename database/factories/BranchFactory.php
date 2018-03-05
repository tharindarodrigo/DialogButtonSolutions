<?php

use Faker\Generator as Faker;

$factory->define(App\Branch::class, function (Faker $faker) {
    return [
        'branch' => $faker->city,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'company_id' => function () {
            return factory(App\Company::class)->create()->id;
        }
    ];
});
