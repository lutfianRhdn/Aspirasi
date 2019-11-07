<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Upvote;
use Faker\Generator as Faker;
use App\User;
use App\Aspiration;

$factory->define(Upvote::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random(1)->first()->id,
    	'Aspiration_id' => Aspiration::all()->random(1)->first()->id,
    ];
});
