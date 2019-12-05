<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Mitarbeiter;
use Faker\Generator as Faker;

$factory->define(Mitarbeiter::class,function (Faker $faker){
   return [
       "Vorname"=>$faker->firstName,
       "Nachname"=>$faker->lastName
   ];
});

