<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    if(Employee::count()){
        $id = Employee::all()->random()->id ?? 1;
    } else{
        $id = 0;
    }

    return [
        'fio' => $faker->name,
        'salary' => $faker->randomFloat(2,1000, 3000),
        'boss_id' => $id,
        'position' => $faker->word,
        'work_start_at' => $faker->dateTimeBetween('-3 month', '-2 month'),
        'avatar' => '',
        'thubnaill' => ''
    ];
});
