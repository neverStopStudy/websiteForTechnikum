<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use App\Article;

$factory->define(Article::class, function (Faker $faker) {
    $status = $faker->boolean;
    return [
        "title" => $faker->sentence,
        "text" => $faker->text,
        "user_id" => 1,
        "status"=> $status ? 0 : 1,
        "views" => 0,
        "created_at" => now(),
        "updated_at" => now(),
    ];
});
