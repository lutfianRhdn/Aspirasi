<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Aspiration;
use Faker\Generator as Faker;
use App\AspirationCategory;
use App\User;
$factory->define(Aspiration::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
    	'aspiration' => $faker->text(10000),
    	'user_id' => User::all()->random(1)->first()->id,
        'aspiration_category_id' => AspirationCategory::all()->random(1)->first()->id,
        'is_anonim' => 0
    ];
});
