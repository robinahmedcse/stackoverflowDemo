<?php

use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {
    return [
        'body'=> $faker->paragraph(rand(3, 7), true),
        'user_id'=> App\User::pluck('id')->random(),
         'votes_count'=> rand(0, 10),
    ];
});



//pluck user in upper version laravel 5.2
//pluck return type array or single value
//5.1 use value for pluck