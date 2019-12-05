<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    return [
        'category_id' => function() {return \App\Models\Category::all()->random()->id;},
        'title' => $faker->text,
        'body' => $faker->realText(),
    ];
});
