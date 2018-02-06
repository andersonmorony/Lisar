<?php
  use Lisar\Model\Produto;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Produto::class, function (Faker\Generator $faker) {
    return [

        'status_id' => $faker->randomDigit,
        'categoria_id' => $faker->randomDigit,
        'titulo_produto' => $faker->word,
        'descricao' => $faker->sentence(10),
        'valor_inicial' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 2, $max = 99999) ,
        'data_divulgacao' => $faker->dateTimeAD($max = 'now', $timezone = null),
        'data_final' => $faker->dateTimeAD($max = 'now', $timezone = null),
        'hora_inicial' => $faker->time($format = 'H:i:s', $max = 'now'),
        'hora_final' => $faker->time($format = 'H:i:s', $max = 'now'),
        'cancelado' => $faker->boolean,

    ];
});
