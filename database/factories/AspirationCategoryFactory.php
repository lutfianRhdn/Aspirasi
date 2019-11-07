<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AspirationCategory;
use Faker\Generator as Faker;

$factory->define(AspirationCategory::class, function (Faker $faker) {
    return [
        'category' => ['Pendidikan', 'Teknologi', 'Infrastruktur', 'Keuangan'][rand(0,3)],

    ];
});
