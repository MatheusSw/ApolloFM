<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OauthTokens;
use Faker\Generator as Faker;

$factory->define(OauthTokens::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'token' => $faker->asciify(str_repeat('*', 255)),
        'token_secret' => $faker->asciify(str_repeat('*', 255)),
    ];
});
