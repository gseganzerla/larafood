<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Plan;
use App\Models\Tenant;
use Faker\Generator as Faker;

$factory->define(Tenant::class, function (Faker $faker) {
    return [
        'plan_id' => factory(Plan::class),
        'cnpj' => $faker->unique()->cnpj(false),
        'name' => $faker->unique()->company,
        'email' => $faker->unique()->safeEmail,
    ];
});
