<?php

use Illuminate\Database\Seeder;

class BerichtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Bericht::class,50)->create();
    }
}
