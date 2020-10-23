<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reports;
use Faker\Generator as Faker;

$factory->define(Reports::class, function (Faker $faker) {
    $frequency = [ 'monthly', 'weekly'];
    $category  = ['artists', 'tracks', 'albums'];
    $type = ['image', 'text'];
    return [
        'user_id' => factory(App\User::class),
        'frequency' => $frequency[array_rand($frequency)],
        'category' => $category[array_rand($category)],
        'type' => $type[array_rand($type)],
        'custom_text' => function (array $post) {
            return $post['type'] == 'text' ? Str::random(50) : null;
        },
        'next_report' => $faker->dateTime(),
    ];
});
