<?php

use Illuminate\Database\Seeder;

class ArmateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\armateur::class,10)->create();
    }
}

