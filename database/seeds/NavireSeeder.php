<?php

use Illuminate\Database\Seeder;

class NavireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\navire::class, 10)->make();

    }
}
