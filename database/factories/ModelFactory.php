<?php


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nombre' => $faker->name,
        'correo' => $faker->unique()->safeEmail,
        'contrasena' => $password ?: $password = bcrypt('umg'),
        'remember_token' => str_random(10)
    ];
});
