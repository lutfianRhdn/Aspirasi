<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;
use App\Aspiration;
use App\User;
$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random(1)->first()->id,
        'aspiration_id' => Aspiration::all()->random(1)->first()->id,
        'comment' => $faker->text(random_int(10,100))
    ];
});
