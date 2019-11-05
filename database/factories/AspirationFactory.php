<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Aspiration;
use Faker\Generator as Faker;
use App\AspirationCategory;

$factory->define(Aspiration::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
    'aspiration' => $faker->text(10000),
        'aspiration_category_id' => AspirationCategory::all()->random(1)->first()->id,
        'is_anonim' => 0
    ];
});
