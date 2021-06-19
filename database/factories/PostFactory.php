<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'image' => '',
        'content' => $faker->text,
        'cat_id' => rand(1,4),
        'user_id' => 1,
    ];
});