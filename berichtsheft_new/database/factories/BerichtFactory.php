<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Bericht;
use App\Models\Mitarbeiter;
use Faker\Generator as Faker;

$factory->define(Bericht::class,function (Faker $faker){
    return [
        "Bericht"=>$faker->realText(),
        "Datum"=>$faker->date('Y-m-d H:i:s'),
        "mitarbeiter_id"=>function(){
            $mitarbeiter=Mitarbeiter::inRandomOrder()->first();
            if(!$mitarbeiter){
                return factory(\App\Models\Mitarbeiter::class)->create()->id;
            }
            return $mitarbeiter->id;
        }
    ];
});
